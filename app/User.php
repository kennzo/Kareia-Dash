<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets all properties that user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany('App\Models\Property\Property');
    }

    /**
     * Gets all rental estimates that user owns.
     */
    public function rentalEstimates()
    {
        return $this->hasManyThrough(
            'App\Models\Estimates\RentalEstimate\RentalEstimate',
            'App\Models\Property\Property'
        );
    }
}
