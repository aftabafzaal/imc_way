<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitDeliverables extends Model {
    protected $fillable = ['description_en', 'description_ar', 'status'];
}
