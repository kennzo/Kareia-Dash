<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Property as PropertyRequest;

class PropertyController extends Controller
{
    /**
     * Ensures that only authorized users may enter this route
     **/
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            'property',
            [
                'only' => [
                    'show',
                    'edit',
                    'update',
                    'destroy'
                ]
            ]
        );
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

        return view("property.index", compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("property.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
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

        return redirect()
            ->route('property.show', array('id' => $property->id))
            ->with('message', 'Property successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param Property $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view("property.show", compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view("property.edit", compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PropertyRequest|Request $request
     * @param Property $property
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(PropertyRequest $request, Property $property)
    {
        /** @var Property $property */
//        $property = Property::findOrFail($id);
        $input = $request->all();
        $property->update($input);

        return redirect()->route('property.show', ['property' => $property])
            ->with(['message' => 'Property updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('property.index')
            ->with(['message' => 'Property deleted!']);
    }
}
