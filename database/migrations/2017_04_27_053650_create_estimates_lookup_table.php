<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesLookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates_lookup', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->index('estimates_lookup_property_id');
                $table->foreign('property_id')->references('id')->on('properties');
            $table->integer('estimate_types_id')->index('estimates_lookup_estimate_types_id');
                $table->foreign('estimate_types_id')->references('id')->on('estimate_types');
            $table->integer('estimate_id')->index('estimates_lookup_estimates_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimates_lookup');
    }
}

