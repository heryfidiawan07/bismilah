<?php

namespace App;

use App\Brand;
use App\Mobil;
use App\Vcomment;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','slug','link','mobil_id','brand_id'];

    public function mobil(){
    	return $this->belongsTo(Mobil::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function vcomments(){
    	return $this->hasMany(Vcomment::class);
    }

    public function jmlvCom(){
        return $this->vcomments->count();
    }
    
}
