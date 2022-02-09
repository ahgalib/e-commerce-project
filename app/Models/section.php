<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    public function categories(){
        return $this->hasMany(category::class)->where(['parent_id'=>'ROOT','status'=>1])->with('subcategories');
    }
}
