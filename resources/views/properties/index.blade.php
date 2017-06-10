@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Properties |
                        {{
                            link_to_route(
                                'properties.create',
                                'Create Property'
                            )
                        }}
                    </div>
                    <div class="panel-body">
                        @foreach($properties as $property)
                            <div class="col-lg-12">
                                {{
                                    link_to_route(
                                        'property',
                                        $property->present()->fullAddress,
                                        ['id' => $property->id]
                                    )
                                }} | (
                                {{
                                    link_to_route(
                                        'property.edit',
                                        'Edit',
                                        ['property' => $property]
                                    )
                                }} |
                                Delete )
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection