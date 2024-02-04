@extends("layouts.master")

@section("contenu")

<div class="card uper">
  <div class="card-header">
    <h2>Créer un Post</h2>
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
    
{!! Form::open(array('route'=>'posts.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titre du Post:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Titre','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contenu:</strong>

            {!! Form::textarea('content', null, array('placeholder' => 'Contenu','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image du Post:</strong>
            {!! Form::file('image', null, array('placeholder' => 'Image','class' => 'form-control')) !!}
       </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category du Post:</strong>
            {{--{!! Form::text('category', null, array('placeholder' => 'Category du post','class' => 'form-control')) !!}--}}
            <select name="category" id="category">
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
     
     <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('posts.index') }}">Blog</a>
     </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
{!! Form::close() !!}

  </div>
</div>

@endsection