<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tag extends Model
{
    use HasUuids;

protected $primaryKey = 'id'; // this is the primary key of the table
protected $keyType = 'string'; // UUID - Universally Unique Identifier it cosists of letters and numbers 36 characters 128 bits
public $incrementing = false; // this indicates if the primary key is auto-incrementing

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
