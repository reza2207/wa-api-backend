<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = "articles";
 
    protected $fillable = ['title','content', 'image', 'slug', 'id_users'];

    public function user_post()
    {   
        
        return $this->belongsTo('App\User', 'id');
    }
}
