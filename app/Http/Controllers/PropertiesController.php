<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        $properties = [];

        return view("properties.index", compact('properties'));
    }
}
