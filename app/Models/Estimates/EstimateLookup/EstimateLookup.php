<?php

namespace App\Models\Estimates\EstimateLookup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimateLookup extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'estimate_type_id',
        'estimate_id',
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
     * References the property that owns this estimate lookup
     */
    public function property()
    {
        return $this->hasOne('App\Models\Property\Property');
    }

    public function estimatesType()
    {
        return $this->belongsTo('App\Models\Estimates\EstimateTypes\EstimateTypes');
    }
}
