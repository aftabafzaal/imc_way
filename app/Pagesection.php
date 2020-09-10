<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagesection extends Model
{
     protected $fillable = [
         'page','section','title_en','title_ar', 'description_en','description_ar','bgcolor','icon','icon_ar'
      ];
}
