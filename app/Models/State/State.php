<?php

namespace App\Models\State;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'abbreviation'
    ];

    // Sets the usage of timestamps to false. Need this so that when you run the seeder, you don't get an error.
    public $timestamps = false;
}
