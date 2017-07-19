@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-2">
                                Properties
                            </div>
                            <div class="col-md-2 pull-right">
                                {{
                                    link_to_route(
                                        'property.create',
                                        'Create Property'
                                    )
                                }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($properties as $property)
                            <div class="col-lg-12">
                                {{
                                    link_to_route(
                                        'property.show',
                                        $property->present()->fullAddress,
                                        ['property' => $property]
                                    )
                                }} | (
                                {{
                                    link_to_route(
                                        'property.edit',
                                        'Edit',
                                        ['property' => $property]
                                    )
                                }} |
                                {{
                                    link_to_route(
                                        'property.destroy',
                                        'Delete',
                                        ['property' => $property],
                                        ['onclick' => "return confirm('Are you sure?')"]
                                    )
                                }} )
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection