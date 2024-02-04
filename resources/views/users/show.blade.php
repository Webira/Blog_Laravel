{{--@extends("layouts.master")

@section('content')--}}
@extends("layouts.master")

@section("contenu")
    <div class="bg-light p-4 rounded">
        <h2>Espace d'un User</h2>
        
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
                Mot de passe: {{ $user->password }}
            </div>
            {{--<div>
                Roles:  @if(!empty($user->getAllRoleNameAttribute()))
                @foreach($user->getAllRoleNameAttribute() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
            </div>--}}
            <div>
                Date created: {{ $user->created_at}}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">Modifier</a> 
       
    </div>
    <div class="mt-4">  
        <a href="{{ route('users.index')}}" class="btn btn-sm btn-primary">Retour</a>
    </div>
 @endsection