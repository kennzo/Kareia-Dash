@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $property->streetAddress }}</div>
                    <div class="panel-body">
                        <p>{{ $property->present()->fullAddress }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection