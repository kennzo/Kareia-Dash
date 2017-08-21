@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Property Information:
                    </div>
                    <div class="panel-heading">
                        <div class="pull-right">
                            @include('property.include.destroyButton')
                        </div>
                        <div class="pull-right">
                            @include('property.include.editButton')
                        </div>
                        {{ link_to_route('property.index', "Back to All Properties") }}
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
    <!-- Rental Estimate area -->
    @include('rentalEstimate.propertyIndex')
    <!-- End Rental Estimate area -->
@endsection