@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Properties</div>

                <div class="panel-body">
                    <a href="{{ route('property.index') }}">Go here for your properties.</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
