<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Property extends Model
{
    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\Models\Property\PropertyPresenter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street_address', 'city', 'state_id', 'zip'
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
        return $this->belongsTo('App\Models\States\States');
    }
}
