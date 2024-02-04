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
                <h2>Gestion des Posts</h2>
            </div>
    </div>    
    <div class="col-ms-6">
            <div class="pull-right">
            {{--@can('role-create')--}}
                <a class="btn  btn-primary btn-sm" href="{{ route('posts.create') }}">Créer un Post</a>
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
            <th>TITRE</th>
            <th>CONTENU</th>
            <th>IMAGE</th>
            <th>USER</th>
            <th>CATEGORY</th>
            <th>CREATION </th>
            <th width="280px">ACTIONS</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 40) }}
                    {{--<a class="btn btn-secondary btn-sm" href="{{ route('posts.show', $post) }}">Voir plus →</a>--}}
                </td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn  btn-primary btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                {{-- @can('role-edit')--}}
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Modifier</a>
                {{-- @endcan--}}
                    {{--@can('role-delete')--}}
                        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn  btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    {{--@endcan--}}
                    {{--<a href="#" class='btn  btn-primary btn-sm' 
                                onclick="event.preventDefault();
                                document.getElementById('destroy-post-form').submit();">Supprimer</a>
                             <form method="post" action="{{ route('post.destroy', $post) }}" id="destroy-post-form">
                                    @csrf
                                    @method('delete')
                            </form>--}}
                     </td>
            </tr>
          @endforeach
          
    </table>
            <div class="pull-right p-4 pt-5">
            {{--@can('role-create')--}}
                <a class="btn  btn-primary btn-sm" href="{{ route('categorys.create') }}">Créer une Category</a>
            {{-- @endcan--}}
            </div>
            <div class="pull-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('categorys.index') }}">Gestion des Categories</a>
            </div>

        <div class="float-left p-4 pt-5">
                        {{$posts->links()}}
        </div>
    </div>
  </div>

@endsection