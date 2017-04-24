@if (Session::has('message'))
    <div class="GeneralMessage">{!! Session::get('message') !!}</div>
@endif
