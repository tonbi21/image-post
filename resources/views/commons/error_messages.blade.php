@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <ul class="alert alert-danger" role="alert">
            <li class="ml-4">{{ $error }}</li>
        </ul>
    @endforeach
@endif

