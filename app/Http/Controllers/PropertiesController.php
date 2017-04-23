<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Request;

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
     * @return Factory|View
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
     * @return Factory|View
     */
    public function property($id)
    {
        $property = Property::find($id);

        return view("properties.property", compact('property'));
    }

    /**
     * Fetch the view for creating a property
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("properties.create");
    }

    /**
     * Stores the view for creating a property (POST)
     */
    public function store()
    {
        $property = new Property();
        $property->setAttribute('user_id', Auth::user()->getAuthIdentifier());
        $property->setAttribute('street_address', Request::input('street_address'));
        $property->setAttribute('city', Request::input('city'));
        $property->setAttribute('state_id', Request::input('state_id'));
        $property->setAttribute('zip', Request::input('zip'));
        $property->setAttribute('bedrooms', Request::input('bedrooms'));
        $property->setAttribute('bathrooms', Request::input('bathrooms'));
        $property->setAttribute('garages', Request::input('garages'));
        $property->setAttribute('year_built', Request::input('year_built'));
        $property->setAttribute('living_square_footage', Request::input('living_square_footage'));
        $property->setAttribute('lot_square_footage', Request::input('lot_square_footage'));
        $property->setAttribute('neighborhood', Request::input('neighborhood'));

        $property->save();

        return redirect()->route('properties')->with('message', 'Property successfully added!');
    }
}
