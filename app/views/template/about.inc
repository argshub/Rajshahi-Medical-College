@extend('template/default')
    @attach('content')
        <a href="{{ route('HOME_VIEW') }}">Home</a>
        @if(count($name))
            @foreach($name as $item)
            <h4>{{ $item }}</h4>
            @endforeach
        @endif
    @stop