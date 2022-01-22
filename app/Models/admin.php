<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
    use HasFactory;
 use Notifiable;
    protected $guard = 'admin';
    protected $fillable = ['name','type','mobile','status','email','password','image'];
    protected $hidden = ['remember_token'] ;

}
