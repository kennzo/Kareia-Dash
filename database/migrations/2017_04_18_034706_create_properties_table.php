<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('properties_user_id');
            $table->string('street_address');
            $table->string('city');
            $table->integer('state_id');
            $table->string('zip');
            $table->integer('bedrooms');
            $table->float('bathrooms');
            $table->integer('garages');
            $table->integer('year_built');
            $table->integer('living_square_footage');
            $table->integer('lot_square_footage');
            $table->string('neighborhood');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
