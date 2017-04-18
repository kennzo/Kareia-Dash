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
        'streetAddress', 'city', 'stateId', 'zip'
    ];
}
