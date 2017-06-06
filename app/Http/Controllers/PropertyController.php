<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use Auth;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Ensures that only authorized users may enter this route
     **/
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::user()->getAuthIdentifier())
            ->orderBy('created_at', 'desc')
            ->get();

        return view("properties.index", compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("properties.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect()->route('properties')->with('message', 'Property successfully added!');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);

        return view("properties.property", compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}