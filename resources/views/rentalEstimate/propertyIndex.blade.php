<div class="panel-heading">
    Rental Estimates: | {{ link_to_route('property.create', "Create New Estimate", ['id' => $property->id]) }}
</div>
<div class="panel-body">
    <div class="well">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>ARV</th>
                <th>Rental ARV</th>
            </thead>
            @foreach($rentalEstimates as $rentalEstimate)
                <tr>
                    <td>{{ $rentalEstimate->name }}</td>
                    <td>{{ $rentalEstimate->arv }}</td>
                    <td>{{ $rentalEstimate->rental_arv }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
