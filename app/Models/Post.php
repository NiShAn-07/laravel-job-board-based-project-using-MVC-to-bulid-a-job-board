<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    
use HasFactory;
use HasUuids ; // this trait is used to generate UUIDs for the model

protected $primaryKey = 'id'; // this is the primary key of the table
protected $keyType = 'string'; // UUID - Universally Unique Identifier it cosists of letters and numbers 36 characters 128 bits
public $incrementing = false; // this indicates if the primary key is auto-incrementing
protected $table = 'post'; 

protected $fillable = [ // tihs is for mass assignment
    'title',
    'body',
    'author',
    'published',
];

protected $guarded = [ // this is to protect these fields from mass assignment
    'id',
    'created_at',
    'updated_at',
];


public function comments(){
    return $this->hasMany(Comment::class); // this bring all ''''comments'''' related to this ""post""

}

public function tags(){
return $this->belongsToMany (Tag::class);
}

}