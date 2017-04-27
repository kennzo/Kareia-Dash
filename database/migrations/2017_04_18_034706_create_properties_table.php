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
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('street_address');
            $table->string('city');
            $table->integer('state_id');
            $table->string('zip');
            $table->integer('bedrooms')->nullable();
            $table->decimal('bathrooms', 2, 1)->nullable();
            $table->integer('garages')->nullable();
            $table->integer('year_built')->nullable();
            $table->integer('living_square_footage')->nullable();
            $table->integer('lot_square_footage')->nullable();
            $table->string('neighborhood')->nullable();
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
