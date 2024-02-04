<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        return view('categorys.posts.create', compact('category'));
        //à faire
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $imageName = $request->image->store('posts');
        //$imageName = 'image|sometimes';

        $category->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName
        ]);

        return redirect()->route('dashboard.dashboardAdmin');
    }


}