<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['brand_id','depan','samping','belakang','model','slug'];
		
		public function brand(){
		   return $this->belongsTo(Brand::class);
		}
		    		    		
}
