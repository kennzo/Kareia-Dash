@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Rental Estimate</div>
                    <div class="panel-body">
                        <div class="well">
                            {!! Form::open([
                                'id' => 'form-rental-estimate-create',
                                'class' => 'form-horizontal',
                                'method' => 'post',
                                'route' => ['rentalEstimate.store'],
                            ]) !!}
                            @if (!empty($propertyId))
                                <input type="hidden" name="property_id" value={!! $propertyId !!}>
                            @else
                                @include("_forms.userProperties", ['properties' => $propertiesArray])
                            @endif
                            @include("_forms.rentalEstimate-input", ['submitButtonText' => 'Add New Estimate', 'showDeleteButton' => false])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection