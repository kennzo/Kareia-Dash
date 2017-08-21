<div class='form-group'>
    {!! Form::label('property_id', 'Property:', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-8">
        {!!
            Form::select(
                'property_id',
                $properties,
                null,
                ['class' => 'form-control' ]
            )
        !!}
    </div>
</div>

