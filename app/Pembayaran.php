<?php

namespace App;

use App\Marketing;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable =['sales_id','img','pengirim','bank'];

    public function marketing(){
    	return $this->belongsTo(Marketing::class, 'sales_id');
    }
    
}
