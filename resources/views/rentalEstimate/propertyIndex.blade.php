<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Rental Estimates:
            <div class="pull-right">
                {{ link_to_route('rentalEstimate.create', "Create New Estimate", ['propertyId' => $property->id]) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#create_rental_estimate">Info</a></li>
                        @foreach($rentalEstimates as $rentalEstimate)
                            <li><a data-toggle="tab" href="#{{ $rentalEstimate->present()->convertNameToCssId }}">{{ $rentalEstimate->name }}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        <div id="create_rental_estimate" class="tab-pane fade in active">
                            <br/>
                            <h4>Information Paragraph</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        @foreach($rentalEstimates as $rentalEstimate)
                            <div id="{{ $rentalEstimate->present()->convertNameToCssId }}" class="tab-pane fade">
                                <br/>
                                <div class="well">
                                    {!! Form::model(
                                        $rentalEstimate,
                                        [
                                            'id' => 'form-rental-estimate-update',
                                            'class' => 'form-horizontal',
                                            'method' => 'PATCH',
                                            'action' => [
                                                'RentalEstimateController@update',
                                                $rentalEstimate
                                            ],
                                        ]) !!}
                                        @include("_forms.rentalEstimate-input", ['submitButtonText' => 'Save Estimate'])
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
