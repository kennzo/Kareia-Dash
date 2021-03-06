@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Property</div>
                    <div class="panel-body">
                        <div class="well">
                            {!! Form::open([
                                'id' => 'form-property-create',
                                'class' => 'form-horizontal',
                                'method' => 'post',
                                'route' => ['property.store'],
                            ]) !!}
                            @include("_forms.property-input", ['submitButtonText' => 'Add Property'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection