<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
        use HasFactory;

    protected $table = "comment";  // Specify the table name
    protected $fillable = ['author', 'content' , 'post_id'];  // post_id must be same as the primary key in posts table

    protected $guarded = ['id']; // Prevent mass assignment on the 'id' field

   
    public function post(){
    return $this->belongsTo(Post::class, 'post_id', 'id');
                    }
}
