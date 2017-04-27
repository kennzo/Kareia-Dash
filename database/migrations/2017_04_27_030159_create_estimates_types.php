<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('estimate_types')->insert([
            'name' => 'Rehab'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Rental'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Retail'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Wholesale'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Wholetail'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Subject To'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Commercial'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'New Construction'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Multi-Family Small'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Multi-Family Medium'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Multi-Family Large'
        ]);

        DB::table('estimate_types')->insert([
            'name' => 'Apartment'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimate_types');
    }
}
