<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $fillable = [
        'img', 'deskripsi', 'hp', 'wa', 'pilihan', 'mulai', 'selesai','status','user_id','bukti',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
