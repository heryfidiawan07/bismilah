<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','slug','link','brand_id'];

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }
    
}
