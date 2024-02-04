    <div class="bg-light p-4 rounded">
        <h1>Show user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                ID: {{ $user->id }}
            </div>
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Username: {{ $user->username }}
            </div>
            <div>
                Nickname: {{ $user->nickname }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Password: {{ $user->password }}
            </div>
            <div>
                Date created: {{ $user->created_at}}
            </div>
        </div>

    </div>
    <div class="mt-4">
    <a href="#" class="nav-link">Edit</a> 
        {{--<a href="{{ route('users.', $user->id) }}" class="btn btn-info">Edit</a>--}}
        <a href="{{ route('usersim')}}" class="btn btn-default">Back</a>
    </div>
@endsection