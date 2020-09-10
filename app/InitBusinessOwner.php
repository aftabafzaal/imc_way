<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitBusinessOwner extends Model {
    protected $fillable = ['title_en', 'title_ar', 'status'];
}
