<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag'; 

protected $fillable = [ // tihs is for mass assignment
    'title'
];

protected $guarded = [ // this is to protect these fields from mass assignment
    'id',
    'created_at'
];


public function posts(){
    return $this->belongsToMany(Post::class);

}





}
