@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Property</div>
                    <div class="panel-body">
                        <div class="well">
                            {!! Form::model(
                                $property,
                                [
                                    'id' => 'form-property-create',
                                    'class' => 'form-horizontal',
                                    'method' => 'PATCH',
                                    'action' => [
                                        'PropertyController@update',
                                        $property->id
                                    ],
                                ]) !!}
                            @include('properties.form', ['submitButtonText' => 'Edit Property'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
