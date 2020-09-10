<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    //
    protected $fillable = [
       'name_en','description_en','name_ar','description_ar','photo1','photo_ar','url','url_ar'
    ];
}
