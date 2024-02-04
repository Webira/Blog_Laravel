@extends("layouts.master")

@section("contenu")
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h2>Ajouter un utilisateur</h2>
  </div>
      <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('users.index') }}">Tableau d'Utilisateurs</a>
           {{--<a class="btn btn-primary" href="{{ route('admin.adopensim.usersim.usersimList') }}">Tableau d'Utilisateurs</a>--}}
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

      
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Surname:</strong>
            {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nickname:</strong>
            {!! Form::text('nickname', null, array('placeholder' => 'Nickname','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    {{--<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,/*$userRole,*/ array('class' => 'form-control','multiple')) !!}
        </div>
    </div>--}}
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
{!! Form::close() !!}

  </div>
</div>

@endsection