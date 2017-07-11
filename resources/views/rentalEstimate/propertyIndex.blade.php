<div class="panel-heading">
    Rental Estimates: | {{ link_to_route('property.create', "Create New Estimate", ['id' => $property->id]) }}
</div>
<div class="panel-body">
    <table class="table table-striped">
        <thead>
            <th>Name</th>
            <th>ARV</th>
            <th>Rental ARV</th>
        </thead>
        @foreach($rentalEstimates as $rentalEstimate)
            <tr>
                <td>{{ $rentalEstimate->name }}</td>
                <td>{{ $rentalEstimate->present()->formatArv }}</td>
                <td>{{ $rentalEstimate->present()->formatRentalArv }}</td>
            </tr>
        @endforeach
    </table>
</div>
