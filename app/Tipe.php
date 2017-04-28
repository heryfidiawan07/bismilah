<?php

namespace App;

use App\Mobil;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['mobil_id','tipe','harga','transmisi','cc'];
    
    public function mobil(){
    	return $this->belongsTo(Mobil::class);
    }
    
}
