<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Comment extends Model
{
        use HasFactory;
        use HasUuids ; // this trait is used to generate UUIDs for the model

        protected $primaryKey = 'id'; // this is the primary key of the table
        protected $keyType = 'string'; // UUID - Universally Unique Identifier it cosists of letters and numbers 36 characters 128 bits
        public $incrementing = false; // this indicates if the primary key is auto-incrementing

    protected $table = "comment";  // Specify the table name
    protected $fillable = ['author', 'content' , 'post_id'];  // post_id must be same as the primary key in posts table

    protected $guarded = ['id']; // Prevent mass assignment on the 'id' field

   
    public function post(){
    return $this->belongsTo(Post::class, 'post_id', 'id');
                    }
}
