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
                            @include("_forms.rentalEstimate-input", ['submitButtonText' => 'Add New Estimate'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection