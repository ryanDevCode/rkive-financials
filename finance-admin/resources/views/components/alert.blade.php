@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@else
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endif
