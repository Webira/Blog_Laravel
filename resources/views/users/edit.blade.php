@extends("layouts.master")

@section("contenu")
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="bg-light p-4 rounded">
{{--<div class="card uper">
  <div class="card-header">--}}
   <h2>Modifier un utilisateur</h2>

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
     
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
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
            <strong>Votre mot de passe</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirmez mot de passe:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles, /* $userRole,*/ array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
    </div>
    </div>
    {!! Form::close() !!}
 
           <div class="mt-4">  
               <a href="{{ route('manager.opensim.usersim.usersimList')}}" class="btn btn-sm btn-primary">Accueil</a>
          </div>
          <div class="mt-4">  
          <a href="{{ route('users.index')}}" class="btn btn-sm btn-primary">Retour</a>
           </div>
    </div>
</div>

@endsection