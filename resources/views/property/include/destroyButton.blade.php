<form action="{{ route('property.destroy', ['property' => $property]) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
    {{--<!--<span class="glyphicon glyphicon-remove"></span>--> Delete--}}
</form>
