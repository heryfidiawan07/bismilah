<?php

namespace App;

use App\Brand;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{		
		// use Searchable;

    protected $fillable = ['title','slug','img','body','brand_id'];

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }
    
}
