<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->index('rental_estimates_property_id');
                $table->foreign('property_id')->references('id')->on('properties');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('arv', 8, 2)->nullable();
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('repairs', 8, 2)->nullable();
            $table->boolean('financed')->nullable();
            $table->decimal('total_loan_amount', 8, 2)->nullable();
            $table->decimal('interest_rate', 8, 3)->nullable();
            $table->integer('term')->nullable();
            $table->decimal('rental_arv', 8, 2);
            $table->decimal('other_income', 8, 2)->nullable();
            $table->decimal('annual_taxes', 8, 2)->nullable();
            $table->decimal('insurance', 8, 2)->nullable();
            $table->enum('hoa_term', ['annual', 'monthly'])->nullable();
            $table->decimal('hoa', 8, 2)->default(0)->nullable();
            $table->boolean('use_property_management')->default(false)->nullable();
            $table->decimal('property_management_fee', 8, 2)->nullable();
            $table->decimal('capital_expenditures', 8, 2)->nullable();
            $table->decimal('vacancy', 8, 2)->nullable();
            $table->decimal('monthly_repairs', 8, 2)->nullable();
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
        Schema::dropIfExists('rental_estimates');
    }
}
