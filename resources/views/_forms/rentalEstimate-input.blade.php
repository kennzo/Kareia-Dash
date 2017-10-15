<fieldset>
    <div class="well">
        <div class='form-group'>
            {!! Form::label('name', 'Name *', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-8">
                {!! Form::text(
                    'name',
                    isset($rentalEstimate)? $rentalEstimate->name : null,
                    ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class='form-group'>
            {!! Form::label('name', 'Description', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-8">
                {!! Form::textarea(
                    'description',
                    isset($rentalEstimate)? $rentalEstimate->description : null,
                    ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="well">
        <h4>Purchase and Finance</h4>
        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('arv', 'After Repair Value (ARV)', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'arv',
                            isset($rentalEstimate)? $rentalEstimate->arv : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('purchase_price', 'Purchase Price *', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'purchase_price',
                            isset($rentalEstimate)? $rentalEstimate->purchase_price : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('repairs', 'Repairs:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'repairs',
                            isset($rentalEstimate)? $rentalEstimate->repairs : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('financed', 'Financed:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7">
                        {!! Form::checkbox(
                            'financed',
                            1,
                            isset($rentalEstimate)? $rentalEstimate->financed : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                {{--<div id="{{ 'financed-' . $rentalEstimate->id }}" style="display: none;">--}}
                <div id="{{ 'financed-' . $rentalEstimate->id }}">
                    <div class='form-group'>
                        {!! Form::label('total_loan_amount', 'Total Loan Amount:', ['class' => 'col-md-5 control-label']) !!}
                        <div class="col-md-7 input-group">
                            <span class="input-group-addon">$</span>
                            {!! Form::number(
                                'total_loan_amount',
                                isset($rentalEstimate)? $rentalEstimate->total_loan_amount : null,
                                ['class' => 'form-control', 'step' => '0.1']) !!}
                        </div>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('interest_rate', 'Interest Rate:', ['class' => 'col-md-5 control-label']) !!}
                        <div class="col-md-7 input-group">
                            {!! Form::number(
                                'interest_rate',
                                isset($rentalEstimate)? $rentalEstimate->interest_rate : null,
                                ['class' => 'form-control', 'step' => '0.001']) !!}
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('term', 'Term:', ['class' => 'col-md-5 control-label']) !!}
                        <div class="col-md-7 input-group">
                            {!! Form::number(
                                'term',
                                isset($rentalEstimate)? $rentalEstimate->term : null,
                                ['class' => 'form-control']) !!}
                            <span class="input-group-addon">
                    {!! Form::select(
                        'time_units',
                        [
                            'years' => 'years.months',
                            'months' => 'months',
                        ]
                    ) !!}
                       </span>

                        </div>
                    </div>
                </div>
            </div> <!-- col-md-4 -->
        </div> <!-- row -->
    </div> <!-- well -->

    <div class="well">
        <h4>Income</h4>
        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('rental_arv', 'Rental ARV *:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'rental_arv',
                            isset($rentalEstimate)? $rentalEstimate->rental_arv : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('other_income', 'Other Income:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'other_income',
                            isset($rentalEstimate)? $rentalEstimate->other_income : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h5>Enter in your income generated by the property.</h5>
                <ul>
                    <li>Rental ARV = Monthly rental payment.</li>
                    <li>Other income = This may include storage units, laundromats, services provided, etc.</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="well">
        <h4>Expenses</h4>
        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('annual_taxes', 'Annual Taxes:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'annual_taxes',
                            isset($rentalEstimate)? $rentalEstimate->annual_taxes : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('insurance', 'Insurance:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'insurance',
                            isset($rentalEstimate)? $rentalEstimate->insurance : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('hoa', 'Home Owners Association:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'hoa',
                            isset($rentalEstimate)? $rentalEstimate->hoa : null,
                            ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                    {!! Form::select(
                        'hoa_term',
                        [
                            'annual' => 'annual',
                            'monthly' => 'monthly',
                        ]
                    ) !!}
               </span>
                    </div>
                </div>
            </div>
            <div class ="col-md-8">
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('use_property_management', 'Use Property Management:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::checkbox(
                            'use_property_management',
                            1,
                            isset($rentalEstimate)? $rentalEstimate->use_property_management : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('property_management_fee', 'Property Management Fee:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'property_management_fee',
                            isset($rentalEstimate)? $rentalEstimate->property_management_fee : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('capital_expenditures', 'Capital Expenditures:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'capital_expenditures',
                            isset($rentalEstimate)? $rentalEstimate->capital_expenditures : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('vacancy', 'Vacancy:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'vacancy',
                            isset($rentalEstimate)? $rentalEstimate->vacancy : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! Form::label('monthly_repairs', 'Monthly Repairs:', ['class' => 'col-md-5 control-label']) !!}
                    <div class="col-md-7 input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::number(
                            'monthly_repairs',
                            isset($rentalEstimate)? $rentalEstimate->monthly_repairs : null,
                            ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            </div>
        </div>

    <br/>
</fieldset>
