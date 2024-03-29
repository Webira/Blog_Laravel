@extends("layouts.master")

@section("contenu")
    <h2></h2>
<div class="row">
<div class="col-md-6">
    {{--<div class="col-lg-12 margin-tb">--}}
        <div class="pull-left">
            <h2>Gestion des Rôles</h2>
        </div>
        <div class="pull-right">
        {{--@can('role-create')--}}
            <a class="btn  btn-primary " href="{{ route('roles.create') }}">Créer un Rôle</a>
           {{-- @endcan--}}
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>ID</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn  btn-primary btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
           {{-- @can('role-edit')--}}
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
           {{-- @endcan
            @can('role-delete')--}}
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn  btn-primary btn-sm']) !!}
                {!! Form::close() !!}
            {{--@endcan--}}
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->render() !!}

@endsection
