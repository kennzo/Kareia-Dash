#!/bin/bash

###############################
# Usages
#
# ./refresh.sh # pull from current branch, no composer install
#
# ./refresh.sh y # pull from current branch, run composer install
#
# ./refresh.sh some_branch # checkout and pull the given branch, no composer install
#
# ./refresh.sh some_branch y # checkout and pull the given branch, run composer install
###############################

##
# Stop execution on error
##

set -e

##
# Environment variable keeps gpsql binaries from having
# to prompt the user for password on each execution.
##

export PGPASSWORD="secret"

##
# List of databases we are going clear
##

DATABASES=(
	kareia-dash
	kareia-dash_testing
)

##
# We need to be in project root
##

if [ ! -f "./composer.json" ]; then
	echo
	echo "Hey you crazy dude, we must needs be in the project root!"
	echo
	exit 1
fi

##
# Composer Install can take forever to run. The script
# assumes you don't want to run it. If you pass "y" as the
# first or second parameter then composer install will be run.
##

COMPOSERINSTALL="n"

if [[ "$1" = "y" || "$2" = "y" ]]; then
    COMPOSERINSTALL="y"
fi


##
# A Branch name can be passed by command line.
# If passed then the branch will be checked out.
# If not passed then a pull will be done on the
# current branch.
##

BRANCH="$1"

if [[ -z "${BRANCH}"  ||  "${BRANCH}" = "y" ]]; then
    echo -n "Pulling current branch..."
    git pull
    echo "done!"

else
    echo -n "Checking out $BRANCH..."
    git checkout "${BRANCH}"
    git pull
    echo "done!"
fi

##
# Wipe out databases
##

for DB in ${DATABASES[@]}; do
	echo -n "Resetting $DB..."
	dropdb --host localhost --user homestead "${DB}"
	createdb --host localhost --user homestead "${DB}"
	echo "done!"
done

##
# Clean-up application state and wipe out doctrine cache and proxies.
##

echo -n "Removing old logs..."
rm -f ./storage/logs/*.log
echo "done!"

echo -n "Removing generated views..."
rm -f ./storage/framework/views/*
echo "done!"

echo -n "Removing doctrine proxies..."
rm -f ./storage/doctrine/proxy/*.php
echo "done!"

echo -n "Flushing redis..."
/usr/bin/redis-cli flushall > /dev/null
echo "done!"

##
# Install dependencies and/or refresh autoloader
##

if [ "${COMPOSERINSTALL}" = "y" ]; then
    /usr/local/bin/composer install -o
else
    /usr/local/bin/composer dump-autoload
fi

echo -n "Removing compiled object cache..."
/usr/bin/php artisan clear-compiled
echo "done!"

##
# Clear cache
##
echo "Clearing the config..."
php artisan cache:clear
echo "done!"

##
# Create doctrine proxies
##

#echo "Creating Doctrine Proxy Objects..."
#./vendor/bin/doctrine orm:generate-proxies

##
# Run migrations and seed data
##

echo "Migrating and seeding tables..."
php artisan migrate --seed

echo "Migrating and seeding tables for testing..."
php artisan config:clear
php artisan migrate --env=testing --seed

##
# Generate IDE helper files
##

echo "Creating PHPStorm IDE helper file..."
php artisan ide-helper:generate
php artisan ide-helper:meta

##
# Hooray!
##

echo
echo "All done my friend!"
echo
