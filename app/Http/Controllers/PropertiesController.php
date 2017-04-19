<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /*
     * Ensures that only authorized users may enter this route
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Gets all the properties.
     * This will eventually have the userId passed in so that you only fetch the properties for a user.
     *
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        $properties = Property::all();

        return view("properties.index", compact('properties'));
    }

    /**
     * Gets the individual property for viewing
     *
     * @param $id
     *
     * @return Factory|\Illuminate\View\View
     */
    public function property($id)
    {
        $property = Property::find($id);

        // todo: Investigate what's up with foreign keys here and how to access their data
        $state = Property::find(1)->state();
//        dd($state);

        return view("properties.property", compact('property', 'state'));
    }
}
