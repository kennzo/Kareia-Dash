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
                        @include('property.include.editButton')
                        @include('property.include.destroyButton')
                        {{ link_to_route('property.index', "Back to All Properties") }}
                    </div>
                    <div class="panel-body">
                        <div class="well">
                            @include('property.details')
                        </div>
                    </div>
                    @include('rentalEstimate.propertyIndex')
                </div>
            </div>
        </div>
    </div>
@endsection