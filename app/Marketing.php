<?php

namespace App;

use App\User;
use App\Area;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{	
		protected $fillable = ['name','slug','img','pt','alamat','hp1','hp2','tentang','brand_id','area_id','iklan','user_id'];

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function area(){
    	return $this->belongsTo(Area::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
}
