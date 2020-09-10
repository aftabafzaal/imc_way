<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Know_Imc extends Model
{
    //
    protected $fillable = [
          'newsdescription_en', 'newsdescription_ar','knowdescription_en', 'knowdescription_ar', 'photo1', 'video1'
     ];
}
