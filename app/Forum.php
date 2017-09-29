<?php

namespace App;

use App\User;
use App\Brand;
use App\Comment;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{   
    // use Searchable;
    
    protected $fillable = ['title','slug','body','brand_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function jmlCom(){
        return $this->comments->count();
    }
    
}
