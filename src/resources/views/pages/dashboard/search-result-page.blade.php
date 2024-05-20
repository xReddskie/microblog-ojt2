@section('content')
<body>
    Search results for: {{ request('query') }}
    <div class="d-dashboard__create-post">
        @if($results->isNotEmpty())
            @foreach($results as $result)
                <div><a href="{{ route('user.profile', ['id' => $result->id]) }}">{{ $result->username }}</a></div>
            @endforeach
        @else
            <div>No "{{ request('query') }}" found.</div>
        @endif
    </div>
</body>

