<?php

namespace App;

use App\Forum;
use App\Comments;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'slug','status','img','sosmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){
        if ($this->admin == 1) {
            return true;
        }
        return false;
    }

    public function forums(){
        return $this->hasMany(Forum::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getFb(){
        return $this->img;
    }

    public function avatar(){
        if($this->getFb()){
            return $this->getFb();
        }else{
            return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=mm&s=50";
        }
    }

}
