<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
function index(){
    $data = Comment::cursorPaginate(10);
    return view("comment.index" , ["comments" => $data , "title" => "comment"]);

}
function create(){
    
    // Comment::create([
       
    //     "author" =>"Ali",
    //     "content" => "This is a comment",
    //     "post_id" => 5
    // ]);

    Comment::factory(1000000)->create();

return redirect('/comments'); // this will redirect to the blog index page
}


}
