<?php

namespace App;

use App\User;
use App\Forum;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{		
		protected $fillable = ['body', 'user_id', 'forum_id'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function forum(){
    	return $this->belongsTo(Forum::class);
    }
    
}
