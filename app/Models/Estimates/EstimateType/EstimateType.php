<?php

namespace App\Models\Estimates\EstimateType;

use Illuminate\Database\Eloquent\Model;

class EstimateType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name',
    ];

    // Sets the usage of timestamps to false. Need this so that when if you run the seeder,
    // you don't get an error.
    public $timestamps = false;
}
