#!/usr/bin/env bash

##
# Script provides a easy way to execute a Behat feature. It kills and restarts
# phantomjs and artisan serve and then executes the test.
#
# Usages:
#   Run all tests in a feature
#   ./behat.sh ./tests/features/Admin_Can_Cancel_Member.feature
#
#   You can also pass extra params like --name and --suite
#   ./behat.sh ./tests/features/Admin_Can_Cancel_Member.feature --name "Some Scenario"
##

##
# See if PhantomJS is currently running and kill it
##
function killPhantomJs {
    PHANTOMPID=$(ps aux | grep '[p]hantom' | awk '{print $2}')

    if [ ! -z "${PHANTOMPID}" ]; then
        echo -n "Killing PhantomJS..."
        kill "${PHANTOMPID}"
        echo "done"
    fi
}

##
# See if Artisan Serve is currently running and kill it
##
function killArtisanServe {
    ARTISANPID=$(ps aux | grep '[p]hp artisan serve' | awk '{print $2}')

    if [ ! -z "${ARTISANPID}" ]; then
        echo -n "Killing Artisan Serve..."
        kill $(ps aux | grep '/usr/bin/php7.0 -S' | grep -v 'grep' | awk '{print $2}')
        echo "done"
    fi
}

##
# Start phantomJS
##
function startPhantomJs {
    echo -n "Starting PhantomJS..."

#    phantomjs --webdriver=8643 1>/var/log/phantomjs/phantomjs.log 2>/var/log/phantomjs/phantomjs.err & echo $! > /tmp/phantomjs.pid
    phantomjs --webdriver=8643 1>/var/log/phantomjs.log 2>/var/log/phantomjs.err & echo $! > /tmp/phantomjs.pid

    echo "done"
}

##
# Start Artisan Serve
##
function startArtisanServe {
    echo -n "Starting Artisan Serve..."

    php artisan serve --host=privatemoneygoldmine.app --env=behat > /dev/null  2>&1 &

    echo "done"
}

##
# Stop execution on error
##

set -e

##
# Make sure we have a feature to run. Must be fully
# qualified name of feature.
##

if [[ -z "$1" || ! -f "$1" ]]; then
  echo "You forgot to provide a feature to test (file \""$1"\" does not exist)."
  exit 1
fi

##
# See if PhantomJS is currently running and kill it
##

killPhantomJs

##
# See if Artisan Serve is currently running and kill it
##

killArtisanServe

##
# Start phantomJS
##

startPhantomJs

##
# Start Artisan Serve
##

startArtisanServe

##
# Execute Test
##

echo "Executing Test..."

./vendor/bin/behat "$@"

##
# Kill the phantomJs process after test is complete
##

killPhantomJs

##
# Kill the artisan serve process after test is complete
##

killArtisanServe
