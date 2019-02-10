@if(count($errors)> 0)

    @foreach($errors->all() as $error)
        <div class="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif