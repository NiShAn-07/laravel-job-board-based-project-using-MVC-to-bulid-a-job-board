<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
function index(){
    $data = Tag::all();
    return view("tag.index" , ["tags" => $data , "title" => "Tag"]);

}
function create(){
    
    $post =Tag::create([
     'title'=>'Java'
    ]);

// this will redirect to the blog index page
}


function testManyToMany(){
    $post1 = Post::find(1);
    $post2 = Post::find(3);

$post1->tags()->syncWithoutDetaching([1, 3]);
$post2->tags()->syncWithoutDetaching([2, 1]);


    return response()->json([
        'post1' => $post1->tags,
        'post2' => $post2->tags
    ]);
}

 
}
