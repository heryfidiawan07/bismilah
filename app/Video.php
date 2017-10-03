<?php

namespace App;

use App\Mobil;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','slug','link','mobil_id'];

    public function mobil(){
    	return $this->belongsTo(Mobil::class);
    }
    
}
