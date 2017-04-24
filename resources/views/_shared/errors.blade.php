@if ($errors = $errors->all())
    <div class="errors ErrorMessage">
        <p>Oops! There were some errors:</p>
        <ul>
            @foreach ($errors as $error => $messages)
                <li>{!! $messages !!}</li>
            @endforeach
        </ul>
    </div>
@endif
