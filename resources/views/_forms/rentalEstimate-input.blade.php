<fieldset>
    <div class='form-group'>
        {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::text(
                'name',
                isset($rentalEstimate)? $rentalEstimate->name : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('arv', 'After Repair Value (ARV)', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'arv',
                isset($rentalEstiamte)? $rentalEstimate->arv : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('purchase_price', 'Purchase Price', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'purchase_price',
                isset($rentalEstimate)? $rentalEstimate->purchase_price : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('repairs', 'Repairs:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'repairs',
                isset($rentalEstimate)? $rentalEstimate->repairs : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('financed', 'Financed:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::checkbox(
                'financed',
                1,
                isset($rentalEstimate)? $rentalEstimate->financed : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('total_loan_amount', 'Total Loan Amount:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'total_loan_amount',
                isset($rentalEstimate)? $rentalEstimate->total_loan_amount : null,
                ['class' => 'form-control', 'step' => '0.1']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('interest_rate', 'Interest Rate:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'interest_rate',
                isset($rentalEstimate)? $rentalEstimate->interest_rate : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('term', 'Term:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'term',
                isset($rentalEstimate)? $rentalEstimate->term : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('rental_arv', 'Rental ARV:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'rental_arv',
                isset($rentalEstimate)? $rentalEstimate->rental_arv : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('other_income', 'Other Income:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'other_income',
                isset($rentalEstimate)? $rentalEstimate->other_income : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('annual_taxes', 'Annual Taxes:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'annual_taxes',
                isset($rentalEstimate)? $rentalEstimate->annual_taxes : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('insurance', 'Insurance:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'insurance',
                isset($rentalEstimate)? $rentalEstimate->insurance : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('hoa', 'Home Owners Association:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'hoa',
                isset($rentalEstimate)? $rentalEstimate->hoa : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('use_property_management', 'Use Property Management:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::checkbox(
                'use_property_management',
                1,
                isset($rentalEstimate)? $rentalEstimate->use_property_management : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('property_management_fee', 'Property Management Fee:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'property_management_fee',
                isset($rentalEstimate)? $rentalEstimate->property_management_fee : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('capital_expenditures', 'Capital Expenditures:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'capital_expenditures',
                isset($rentalEstimate)? $rentalEstimate->capital_expenditures : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('vacancy', 'Vacancy:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'vacancy',
                isset($rentalEstimate)? $rentalEstimate->vacancy : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('monthly_repairs', 'Monthly Repairs:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-8">
            {!! Form::number(
                'monthly_repairs',
                isset($rentalEstimate)? $rentalEstimate->monthly_repairs : null,
                ['class' => 'form-control']) !!}
        </div>
    </div>

    <br/>

    <div class='form-group'>
        <div class="col-lg-8 col-lg-offset-2">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-info pull-right']) !!}
        </div>
    </div>
</fieldset>
