<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use App\Http\Requests\Property as PropertyValidator;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

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
     *
     * @param PropertyValidator $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PropertyValidator $request)
    {
        $property = new Property();
        $property->setAttribute('user_id', Auth::user()->getAuthIdentifier());
        $property->setAttribute('street_address', $request['street_address']);
        $property->setAttribute('city', $request['city']);
        $property->setAttribute('state_id', $request['state_id']);
        $property->setAttribute('zip', $request['zip']);
        $property->setAttribute('bedrooms', $request['bedrooms']);
        $property->setAttribute('bathrooms', $request['bathrooms']);
        $property->setAttribute('garages', $request['garages']);
        $property->setAttribute('year_built', $request['year_built']);
        $property->setAttribute('living_square_footage', $request['living_square_footage']);
        $property->setAttribute('lot_square_footage', $request['lot_square_footage']);
        $property->setAttribute('neighborhood', $request['neighborhood']);

        $property->save();

        return redirect()->route('properties')->with('message', 'Property successfully added!');
    }
}
