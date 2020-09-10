<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonies extends Model
{
    // 

    protected $fillable = [
       'name_en','description_en','name_ar','description_ar','testimony_en','testimony_ar','video1'
    ];
}
