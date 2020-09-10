<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class InitCategory extends Model {

    use NodeTrait;

    protected $fillable = ['title_en', 'title_ar', 'description_en', 'description_ar', 'slug_en', 'slug_ar', 'status'];

}
