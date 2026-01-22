<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
function index(){
    $data = Post::Paginate(10);
    return view("post.index" , ["posts" => $data , "title" => "Blog"]);

}
function create(){
    
    // $post =Post::create([
    //     "title" => "New Post",
    //     "body" => "This is the content of the new post.",
    //     "author" =>"Ali",
    //     "published" => true
    // ]);

    Post::factory(100)->create();

}

function show($id){

$post = Post::findOrFail($id); // this will throw a 404 error if the post is not found
return view('post.show' , ['post' => $post , 'title' => $post->title]);
}


function delete(){

 post::destroy(5); // delete post with id 5
 return redirect('/blog'); // redirect back to blog index

}
 
}
