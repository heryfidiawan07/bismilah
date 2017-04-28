<?php

namespace App;

use App\Mobil;
use Illuminate\Database\Eloquent\Model;

class Spek extends Model
{
    protected $fillable = ['mobil_id','speks','title','slug'];

    public function mobil(){
    	return $this->belongsTo(Mobil::class);
    }
    
}
