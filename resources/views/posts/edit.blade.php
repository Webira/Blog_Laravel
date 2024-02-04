@extends("layouts.master")

@section("contenu")

  <div class="card uper">
        <div class="card-header">
          <h2>Modifier le post : {{ $post->id }}</h2>
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

      {{--{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}--}} 

    {!! Form::open(array('route' => ['posts.update', $post->id],'method'=>'PUT','enctype'=>'multipart/form-data')) !!}
    @method('put')
    @csrf

    {{--<form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">--}}
                
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre du Post:</strong>
                {!! Form::text('title', $post->title, array('placeholder' => 'Titre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contenu:</strong>
                {!! Form::textarea('content', $post->content, array('placeholder' => 'Contenu','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image du Post:</strong>
                {!! Form::file('image', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
            </div>
            {{--<input type="file",id="image", name="image"/>--}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category du Post:</strong>
                {{--{!! Form::text('category', null, array('placeholder' => 'Category du post','class' => 'form-control')) !!}--}}
                <select name="category" id="category">
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
      
        {{--<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Blog</a>
        </div>--}}
        
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard.dashboardAdmin') }}">Dashboard de Posts</a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>
    {!! Form::close() !!}

    </div>
  </div>

@endsection