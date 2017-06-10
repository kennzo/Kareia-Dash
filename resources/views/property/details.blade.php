<fieldset>
    <div class='form-group'>
        {!! Form::label('property_address', 'Property Address:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->present()->fullAddress }}
    </div>

    <div class='form-group'>
        {!! Form::label('bedrooms', 'Bedrooms:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->bedrooms }}
    </div>

    <div class='form-group'>
        {!! Form::label('bathrooms', 'Bathrooms:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->bathrooms }}
    </div>

    <div class='form-group'>
        {!! Form::label('garages', 'Garages:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->garages }}
    </div>

    <div class='form-group'>
        {!! Form::label('year_built', 'Year built:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->year_built }}
    </div>

    <div class='form-group'>
        {!! Form::label('living_square_footage', 'Living square footage:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->living_square_footage }}
    </div>

    <div class='form-group'>
        {!! Form::label('lot_square_footage', 'Lot size:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->lot_square_footage }}
    </div>

    <div class='form-group'>
        {!! Form::label('neighborhood', 'Neighborhood:', ['class' => 'col-lg-4 control-label']) !!}
        {{ $property->neighborhood }}
    </div>
</fieldset>