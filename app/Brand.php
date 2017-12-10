<?php

namespace App;

use App\Mobil;
use App\Article;
use App\Spek;
use App\Video;
use App\Forum;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = ['brand', 'slug'];

    public function speks(){
        return $this->hasManyThrough('App\Spek', 'App\Mobil');
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function forums(){
        return $this->hasMany(Forum::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

}
