<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','user_name','address','district','phone','another_phone'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
