<div class="container">
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    
    @if ($message = session()->has('success'))
        <div class="alert alert-success" role="alert">
            <h3 class="text-center">{{ session()->get('success') }}</h3>
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>