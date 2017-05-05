<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Property extends Model
{
    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\Models\Property\PropertyPresenter';

    protected $table = "properties";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'street_address',
        'city',
        'state_id',
        'zip',
        'bedrooms',
        'bathrooms',
        'garages',
        'year_built',
        'living_square_footage',
        'lot_square_footage',
        'neighborhood',
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
     * Gets the state associated with this property
     */
    public function state()
    {
        return $this->belongsTo('App\Models\States\State');
    }

    /**
     * Foreign key for user.
     *
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Gets an array of all estimates that are related to the property
     */
    public function estimates()
    {
//        return $this->hasMany('App\Models\Estimates\EstimateLookup\EstimateLookup');
        // todo: Get all elemtns and add to an array
    }

    /**
     * Gets all the estimate lookup elements related to this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentalEstimates()
    {
        return $this->hasMany('App\Models\Estimates\RentalEstimate\RentalEstimate');
    }

    // todo: Add function to fetch rehab estimates
}
