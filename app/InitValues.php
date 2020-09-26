<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitValues extends Model {
    protected $fillable = ['title_en', 'title_ar', 'status'];
}
