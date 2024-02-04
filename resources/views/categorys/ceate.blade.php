@extends("layouts.master")

@section("contenu")
        <div class="card uper">
  <div class="card-header">
    <h2>Créer une catégorie</h2>
  </div>
     
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
    
{!! Form::open(array('route'=>'categorys.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom de la Catégory:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
        </div>
    </div>
    
             
     <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('dashboard.dashboardAdmin') }}">Gestion des Posts</a>
     </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
{!! Form::close() !!}

  </div>
</div>

@endsection