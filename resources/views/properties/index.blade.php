@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Properties</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Property List | +</div>
                    <div class="panel-body">
                        @foreach($properties as $property)
                            123 Main St., Houston, TX 77002
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection