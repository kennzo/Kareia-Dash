<form action="{{ route('rentalEstimate.destroy', ['rentalEstimate' => $rentalEstimate]) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button class="btn btn-lg btn-info" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
    {{--<!--<span class="glyphicon glyphicon-remove"></span>--> Delete--}}
</form>
