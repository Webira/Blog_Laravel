@extends("layouts.master")

@section("contenu")
    <style>
    .w-5{display: none}
    </style>
  
<div class="row p-4 pt-5">
    <div class="col-12">
   
    <div class="col-md-6">
        
        {{--<div class="col-lg-12 margin-tb">--}}
            <div class="pull-left">
                <h2>Gestion des Categories</h2>
            </div>
    </div>    
    <div class="col-ms-6">
            <div class="pull-right">
            {{--@can('role-create')--}}
                <a class="btn  btn-primary btn-sm" href="{{ route('categorys.create') }}">Créer une category</a>
            {{-- @endcan--}}
            </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>CREATION </th>
            <th width="280px">ACTIONS</th>
        </tr>
        @foreach ($categorys as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                       {{--@can('role-delete')--}}
                        {!! Form::open(['method' => 'DELETE','route' => ['categorys.destroy', $category->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn  btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                 </td>
            </tr>
          @endforeach
    </table>
      <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('dashboard.dashboardAdmin') }}">Gestion des Posts</a>
     </div>
    </div>
  </div>

@endsection