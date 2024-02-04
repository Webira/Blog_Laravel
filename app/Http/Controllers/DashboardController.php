<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource for Admin
     *
     * @return Response
     */
    public function dashboardAdmin()
    {
        /* $posts = auth()->user()->posts;
        $posts = Post::with('category', 'user')->latest()->get();
               return view('dashboard', compact('posts'));*/

            $posts=Post::paginate(3);
        return view('dashboard',compact('posts'));


       // return view('dashboard',['posts'=>$posts]); 

        /*return view('posts.index',[
            'posts' => DB::table('posts')->orderBy('id')->cursorPaginate(3)
        ]);*/
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return Response
     */
    public function edit(Post $post)
    {
       if (Gate::denies('update-post', $post)) {
            abort(403);
        }
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
        /*if (Gate::denies('update-post', $post)) {
            abort(403);
        }
            $postUpdateAction->handle($request, $post);*/
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
        if (Gate::denies('delete-post', $post)) {
            abort(403);
        }
        $post->delete();
        //return redirect()->back()->with('success', 'Votre post a été supprimé');
        return redirect()->route('dashboard.dashboardAdmin')->with('success', 'Votre post a été supprimé');
    }
}
