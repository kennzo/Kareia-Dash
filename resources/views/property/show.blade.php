@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Property Information:
                    </div>
                    <div class="panel-heading">
                        {{ link_to_route('property.edit', "Edit", ['id' => $property->id]) }} |
                        {{ link_to_route(
                            'property.destroy',
                            "Delete",
                            ['id' => $property->id],
                            ['onclick' => "return confirm('Are you sure?')"]) }} |
                        {{ link_to_route('properties', "Back to All Properties") }}
                    </div>
                    <div class="panel-body">
                        <div class="well">
                            @include('property.details')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection