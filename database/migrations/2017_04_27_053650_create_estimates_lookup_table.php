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
        Schema::create('estimate_lookups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->index('estimate_lookups_property_id');
                $table->foreign('property_id')->references('id')->on('properties');
            $table->integer('estimate_type_id')->index('estimate_lookups_estimate_type_id');
                $table->foreign('estimate_type_id')->references('id')->on('estimate_types');
            $table->integer('estimate_id')->index('estimate_lookups_estimate_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate_lookups');
    }
}

