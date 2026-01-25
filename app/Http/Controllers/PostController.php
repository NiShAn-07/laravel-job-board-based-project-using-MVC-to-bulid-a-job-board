<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data = Post::latest()->cursorPaginate(10);
            return view("post.index" , ["posts" => $data , "title" => "Blog"]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create" , ["title"=> "Blog - Create a new Post"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TO Do this will be completed in form handling section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id); // this will throw a 404 error if the post is not found
            return view('post.show' , ['post' => $post , 'title' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("post.edit" , ["title"=> "Blog - Edit Post"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
