@extends("layouts.master")

@section("contenu")

    <style>
        .w-5{display: none}
    </style>

<!-- Page header with logo and tagline-->
        <header class="py-1 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-1">
                    <h1 class="fw-bolder">Bienvenue sur l'accueil du Blog!</h1>
                    {{--<div class="text-center my-1">
                    <p class="lead mb-0">Blog</p>
                   </div>--}}
                    </a>
                </div>
            </div>
        </header>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
         @endif
            
       

        <!-- Page content-->
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">

                 @foreach ($posts as $post)
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <h2 class="card-title font-bold">Category : {{ $post->category->name }}</h2>
                        <h2 class="card-title font-bold">Auteur : {{ $post->user->name }}</h2>
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/160x80/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at->format('d M Y') }}</div>
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{ Str::limit($post->content, 120) }}</p>
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.show', $post) }}">Voir plus →</a>
                     @can('admin')        
                        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post) }}">Modifier</a>
                    
                        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn  btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    @endcan 


                        {{--//////
                             <div class="flex items-center justify-between mt-4"><a href="{{ route('posts.show', $post) }}"
                                    class="text-blue-500 hover:underline">Voir plus</a>
                                <div><a href="{{ route('posts.show', $post)ash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80" }}" class="flex items-center"><img
                                            src="https://images.unspl
                                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline">{{ $post->user->name }}</h1>
                                    </a></div>
                            </div>
                        {{--//////--}}
                        </div>
                    </div>
                 @endforeach
                                      
                </div>

                <!-- Side widgets -->
               {{--}} <div class="col-lg-4">
                   <!-- Search widget -->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>--}}
                    <!-- Categories widget-->
            <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            
                                    <select name="category" id="category">
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    {{--<div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#!">Actualités</a></li>
                                                <li><a href="#!">Aide aux utilisateurs</a></li>
                                                <li><a href="#!">Bibliothèque</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#!">JavaScript</a></li>
                                                <li><a href="#!">CSS</a></li>
                                                <li><a href="#!">Tutorials</a></li>
                                            </ul>
                                        </div>
                                </div>--}}
                            </div>
                    </div>
                    <div class="card mb-4"> 
            {{--@can('role-create')--}}
                         <a class="btn  btn-primary" href="{{ route('posts.create') }}">Créer un Post</a>
            {{-- @endcan--}}
                    </div>

                    <!-- Side widget--
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets.
                         They are easy to use, and feature the Bootstrap 5 card component!</div>-->
                         
                     <!-- Pagination-->     
                    <div class=" mb-4 p-4 pt-5"> 
                        {{$posts->links()}}
                    
                    </div>
               
            </div>
        </div>
      
 @endsection