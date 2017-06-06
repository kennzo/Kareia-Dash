@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ link_to_route('properties', "Back to All Properties") }}
                    </div>
                    <div class="panel-body">
                        <h3>Property Information:</h3>
                        <table class="table-bordered">
                            <tr>
                                <td>Property Address:</td>
                                <td>{{ $property->present()->fullAddress }}</td>
                            </tr>
                            <tr>
                                <td>Bedrooms:</td>
                                <td>{{ $property->bedrooms }}</td>
                            </tr>
                            <tr>
                                <td>Bathrooms:</td>
                                <td>{{ $property->bathrooms }}</td>
                            </tr>
                            <tr>
                                <td>Garages:</td>
                                <td>{{ $property->garages }}</td>
                            </tr>
                            <tr>
                                <td>Year built:</td>
                                <td>{{ $property->year_built }}</td>
                            </tr>
                            <tr>
                                <td>Living square footage:</td>
                                <td>{{ $property->living_square_footage }}</td>
                            </tr>
                            <tr>
                                <td>Lot size:</td>
                                <td>{{ $property->lot_square_footage }}</td>
                            </tr>
                            <tr>
                                <td>Neighborhood:</td>
                                <td>{{ $property->neighborhood }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection