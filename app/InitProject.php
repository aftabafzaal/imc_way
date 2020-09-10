<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitProject extends Model {
    //
    protected $fillable = ['title_en', 'title_ar', 'description_en', 'description_ar', 'slug_en', 'slug_ar', 'status','image','media_id'];

    
    
    
    public function categories()
    {
        return $this->hasMany('App\InitProjectCategory','project_id', 'id');
    }
}
