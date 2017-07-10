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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimates\RentalEstimate\RentalEstimate  $rentalEstimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentalEstimate $rentalEstimate)
    {
        //
    }
}
