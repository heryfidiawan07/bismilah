<?php

namespace App;

use App\Brand;
use App\Video;
use App\Spek;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['brand_id','depan','samping','belakang','model','slug'];
		
		public function brand(){
		   return $this->belongsTo(Brand::class);
		}

		public function videos(){
		   return $this->hasMany(Video::class);
		}

		public function speks(){
		   return $this->hasMany(Spek::class);
		}

}
