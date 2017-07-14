<?php

namespace App\Http\Controllers;

use App\Models\Estimates\RentalEstimate\RentalEstimate;
use App\Models\Property\Property;
use Auth;
use Illuminate\Http\Request;

class RentalEstimateController extends Controller
{
    /**
     * Ensures that only authorized users may enter this route
     **/
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware(
//            'property',
//            [
//                'only' => [
//                    'show',
//                    'edit',
//                    'update',
//                    'destroy'
//                ]
//            ]
//        );
    }

    /**
     * Display a listing of the resource that belongs to the user and is associated with the property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertiesArray = [];
        $propertiesArray[''] = "Choose your property...";

        /** @var Property $property */
        foreach(Auth::user()->properties as $property) {
            $propertiesArray[$property->id] = $property->present()->fullAddress;
        }

        return view('rentalEstimate.create', compact('propertiesArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rentalEstimate = new RentalEstimate();
        $rentalEstimate->setAttribute('property_id', $request['property_id']);
        $rentalEstimate->setAttribute('name', $request['name']);
        $rentalEstimate->setAttribute('arv', $request['arv']);
        $rentalEstimate->setAttribute('purchase_price', $request['purchase_price']);
        $rentalEstimate->setAttribute('repairs', $request['repairs']);
        $rentalEstimate->setAttribute('financed', $request['financed']);
        $rentalEstimate->setAttribute('total_loan_amount', $request['total_loan_amount']);
        $rentalEstimate->setAttribute('interest_rate', $request['interest_rate']);
        $rentalEstimate->setAttribute('term', $request['term']);
        $rentalEstimate->setAttribute('rental_arv', $request['rental_arv']);
        $rentalEstimate->setAttribute('other_income', $request['other_income']);
        $rentalEstimate->setAttribute('annual_taxes', $request['annual_taxes']);
        $rentalEstimate->setAttribute('insurance', $request['insurance']);
        $rentalEstimate->setAttribute('hoa', $request['hoa']);
        $rentalEstimate->setAttribute('use_property_management', $request['use_property_management']);
        $rentalEstimate->setAttribute('property_management_fee', $request['property_management_fee']);
        $rentalEstimate->setAttribute('capital_expenditures', $request['capital_expenditures']);
        $rentalEstimate->setAttribute('vacancy', $request['vacancy']);
        $rentalEstimate->setAttribute('monthly_repairs', $request['monthly_repairs']);

        $rentalEstimate->save();

        return redirect()
            ->route('property.show', array('id' => $request['property_id']))
            ->with('message', 'Estimate successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimates\RentalEstimate\RentalEstimate  $rentalEstimate
     * @return \Illuminate\Http\Response
     */
    public function show(RentalEstimate $rentalEstimate)
    {
        // todo: Create a rental estimate presenter
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimates\RentalEstimate\RentalEstimate  $rentalEstimate
     * @return \Illuminate\Http\Response
     */
    public function edit(RentalEstimate $rentalEstimate)
    {
        // May not need this since the editing will be done on the property page
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimates\RentalEstimate\RentalEstimate  $rentalEstimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentalEstimate $rentalEstimate)
    {
        /** @var RentalEstimate $property */
        $input = $request->all();
        $rentalEstimate->update($input);

        return redirect()->route('property.show', ['property' => $rentalEstimate->property])
            ->with(['message' => 'Rental Estimate updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimates\RentalEstimate\RentalEstimate  $rentalEstimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentalEstimate $rentalEstimate)
    {
        $property = $rentalEstimate->property;
        $rentalEstimate->delete();

        return redirect()->route('property.show', ['property' => $property])
            ->with(['message' => 'Rental Estimate deleted!']);
    }
}
