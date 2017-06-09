<fieldset>
    <div class='form-group'>
        {!! Form::label('street_address', 'Street Address', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('street_address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('city', 'City *', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('state', 'State *', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            @include('_forms.state-dropdown')
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('zip_code', 'Zip Code *:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('zip', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('bedrooms', 'Bedrooms:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('bedrooms', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('bathrooms', 'Bathrooms:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('bathrooms', null, ['class' => 'form-control', 'step' => '0.1']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('garages', 'Garages:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('garages', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('year_built', 'Year Built:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('year_built', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('living_square_footage', 'Living Square Footage:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('living_square_footage', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('lot_square_footage', 'Lot Square Footage:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::number('lot_square_footage', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('neighborhood', 'Neighborhood:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <br/>

    <div class='form-group'>
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-info pull-right']) !!}
        </div>
    </div>
</fieldset>
