<?php

namespace App\Models\Estimates\RentalEstimate;

use Illuminate\Database\Eloquent\Model;

class RentalEstimate extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'arv',
        'purchase_price',
        'repairs',
        'financed',
        'total_loan_amount',
        'interest_rate',
        'term',
        'rental_arv',
        'other_income',
        'annual_taxes',
        'insurance',
        'hoa',
        'use_property_management',
        'property_management_fee',
        'capital_expenditures',
        'vacancy',
        'monthly_repairs',
    ];

    /**
     * Property constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Gets the property this estimate is attached to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo('App\Models\Property\Property');
    }
}
