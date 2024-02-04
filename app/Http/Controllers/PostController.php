<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorys = Category::all();
        //$posts = Post::with('category', 'user')->latest()->get();
        $posts=Post::paginate(2);

        return view('posts.index', compact('posts', 'categorys'));
    }

    /**
     * Display a listing of the resource for Admin
     *
     * @return Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        $posts = auth()->user()->posts;
        return view('posts.create', compact('posts','categorys'));  
    }
    /**
     * Store a newly created resource in storage.
     *  Valider l'info passé au post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $imageName = $request->image->store('posts');
       
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
           // Storage::disk('public')->put('posts/'.$imageName file_get_contents($image)),
        ]);
                                 
        return redirect()->route('posts.index')->with('success', 'Votre post a été créé');
    }

    ///////// virsion public 2//////////
   /* public function store(Request $request) {
        // validations
        $request->validate([
          'title' => 'required',
          'content' => 'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $post = new Post;
            /// $imageName = $file_name
        $image = $request->file;
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
      
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $imageName;
      
        Storage::disk('public')->put('posts/'.$imageName, file_get_contents($image));
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
      }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       /*if (Gate::denies('update-post', $post)) {
            abort(403);
        }*/
        $categorys = Category::all();

        return view('posts.edit', compact('post', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post) 
    {
            $arrayUpdate = [
            'title'=> $request->title,
            'content' => $request->content,
        ];

        if ($request->image !=null){
            $imageName = $request->image->store('posts');

            $arrayUpdate = array_merge($arrayUpdate, ['image' => $imageName]);
        }
        $post->update($arrayUpdate);

        return redirect()->route('dashboard.dashboardAdmin')->with('success', 'Votre post a été modifié');
    }                             

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /*if (Gate::denies('delete-post', $post)) {
            abort(403);
        }*/

        $post->delete();

        return redirect()->back()->with('success', 'Votre post a été supprimé');
        
    }
}
