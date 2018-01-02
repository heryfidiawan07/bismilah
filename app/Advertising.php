<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = ['user_id','img','title','description','phone','whatsapp','coverage','start','done','status','perpanjang','resi',];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
