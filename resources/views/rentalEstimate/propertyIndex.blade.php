<div class="panel-heading">
    Rental Estimates:
</div>
<div class="panel-body">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#create_rental_estimate">+</a></li>
        @foreach($rentalEstimates as $rentalEstimate)
        <li><a data-toggle="tab" href="#{{ $rentalEstimate->present()->convertNameToCssId }}">{{ $rentalEstimate->name }}</a></li>
        @endforeach
    </ul>

    <div class="tab-content">
        <div id="create_rental_estimate" class="tab-pane fade in active">
            <br/>
            <h4>{{ link_to_route('rentalEstimate.create', "Create New Estimate", ['propertyId' => $property->id]) }}</h4>
        </div>
        @foreach($rentalEstimates as $rentalEstimate)
        <div id="{{ $rentalEstimate->present()->convertNameToCssId }}" class="tab-pane fade">
            <br/>
            <div class="well">
                {!! Form::open([
                    'id' => 'form-rental-estimate-create',
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'route' => ['rentalEstimate.store'],
                ]) !!}
                @include("_forms.rentalEstimate-input", ['submitButtonText' => 'Save Estimate'])
                {!! Form::close() !!}
            </div>
        </div>
        @endforeach
    </div>
</div>
