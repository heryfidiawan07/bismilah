<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = ['email', 'alamat', 'hp', 'wa', 'pesan',];
}
