@if ($errors->any())
    @foreach ($errors->all() as $e)
        <div>
            {{$e}}
        </div>
    @endforeach
@endif