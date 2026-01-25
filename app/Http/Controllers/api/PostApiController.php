<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Post::latest()->paginate(5);
        return response($data , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Post::create($request->all()); // this will parse all request data and insert into post table
        return response($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::find($id);
        if($data) {
            return response($data,200); 
        }

        return response(["message"=>"Data not found"],404);}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Post::find($id);
        if($data) {
            $data->update($request->all());
            return response($data,200); 
        }

        return response(["message"=>"Data not found"],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::find($id);
        if($data) {
            $data->delete();
            return response(["message"=>"Data deleted successfully"],200); 
        }

        return response(["message"=>"Data not found"],204);
    }
}
