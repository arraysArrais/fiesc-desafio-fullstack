@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li class="alert alert-danger error" role="alert">{{ $error }}</li>
    @endforeach
@else
@endif
