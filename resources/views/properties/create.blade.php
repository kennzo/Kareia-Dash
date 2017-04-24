@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Property</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'route' => ['properties.store'],
                            'method' => 'post',
                            'id' => 'form-property'
                        ]) !!}
                        <table cellpadding="5" cellspacing="0" border="0" class="vertical">
                            <tr>
                                <th>Street Address *:</th>
                                <td>{!! Form::text('street_address') !!}</td>
                            </tr>
                            <tr>
                                <th>City *:</th>
                                <td>{!! Form::text('city') !!}</td>
                            </tr>
                            <tr>
                                <th>State *:</th>
                                <td>@include('_forms.state-dropdown')</td>
                            </tr>
                            <tr>
                                <th>Zip code *:</th>
                                <td>{!! Form::text('zip') !!}</td>
                            </tr>
                            <tr>
                                <th>Bedrooms:</th>
                                <td>{!! Form::number('bedrooms') !!}</td>
                            </tr>
                            <tr>
                                <th>Bathrooms:</th>
                                <td>{!! Form::number('bathrooms', null, ['step' => '0.1']) !!}</td>
                            </tr>
                            <tr>
                                <th>Garages:</th>
                                <td>{!! Form::number('garages') !!}</td>
                            </tr>
                            <tr>
                                <th>Year built:</th>
                                <td>{!! Form::number('year_built') !!}</td>
                            </tr>
                            <tr>
                                <th>Living Square Footage:</th>
                                <td>{!! Form::number('living_square_footage') !!}</td>
                            </tr>
                            <tr>
                                <th>Lot Square Footage:</th>
                                <td>{!! Form::number('lot_square_footage') !!}</td>
                            </tr>
                            <tr>
                                <th>Neighborhood:</th>
                                <td>{!! Form::text('neighborhood') !!}</td>
                            </tr>
                        </table>
                        <input type="submit" value="Create" />
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection