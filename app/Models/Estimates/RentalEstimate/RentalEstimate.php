<?php

namespace App\Models\Estimates\RentalEstimate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class RentalEstimate extends Model
{
    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = RentalEstimatePresenter::class;

    protected $fillable = [
        'property_id',
        'name',
        'description',
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
