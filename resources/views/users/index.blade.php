@extends("layouts.master")
@section("contenu")
            {{--Tableau--}}
<div>
<div class="row p-4 pt-5">
    <div class="col-12">
        <h1>Liste des utilisateurs OpenSim</h1>
        <div class="card">
            <div class="card-header bg-secondary">

            <h3 class="card-title">Utilisateurs d'OpenSim</h3>
            <div class="card-tools d-flex align-items-center">
              
            <a href="{{route('users.create')}}" class="nav-link"><button type="button"
            class="btn btn-block btn-default btn-sm">Ajouter un User</button></a>
           {{-- <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>--}}
            <a href="{{ route('roles.index') }}" class="nav-link"><button type="button"
               class="btn btn-block btn-default btn-sm">Gestion des roles</button></a>

           {{--<a href="{{route('admin.adopensim.volunteers')}}"><button type="button"
            class="btn btn-block btn-default btn-sm">Gestion des volonters</button></a>--}}

            </div>
        </div>

            {{--@if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div><br />
            @endif--}}
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
            <th style="width:5%">ID</th>
            <th style="width:15%">Name</th>
            <th style="width:10%">Surname</th>
            <th style="width:10%">Nickname</th>
            <th style="width:10%">Email</th>
           {{-- <th style="width:10%">Roles</th>
            <th style="width:15%">Password</th>--}}
            <th style="width:5%">Date created</th>
            <th class="text-centre" style="width:5%">Show</th>
            <th class="text-centre" style="width:5%">Modifier</th>
            <th class="text-centre" style="width:5%">Delete</th>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->nickname }}</td>
            <td>{{ $user->email }}</td>

             {{--<td>{{getrolename()}}</td>

           @if(\App\Job::getrolename(Auth::user())=='seeker') https://laracasts.com/discuss/channels/eloquent/call-to-undefined-function-getrolename
           <td>@if(!empty($user->getRolesName()))
                     @foreach($user->getRolesName() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                     @endforeach
                @endif
            </td>--}}
           {{-- <td>{{ $user->password }}</td>--}}
            <td>{{ $user->created_at }}</td>

            {{-- <td><a href="{{ route('users.show', $user->id)}}" class="btn btn-primary">Show</a></td>
           <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Modifier</a></td>--}}
           
            <td class="text-center">
                <a href="{{ route('users.show', $user->id)}}" button class="btn btn-link"><i class="far fa-user"></i></button></a>
            </td>
            <td class="text-center">
                <a href="{{ route('users.edit', $user->id)}}" button class="btn btn-link"><i class="far fa-edit"></i></button></a>
                
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-link"><i class="far fa-trash-alt"></i></button>
                  {{-- <button class="btn btn-info" type="submit">Supprimer</button>--}}
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
            <div class="float-left p-4 pt-5">
                {{ $users->links()}}
            </div>
        </div>
        </div>
    </div>
</div>

@endsection