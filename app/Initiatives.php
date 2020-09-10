<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiatives extends Model {

    protected $fillable = ['title_en', 'title_ar', 'where_en', 'where_ar', 'url_title', 'url', 'project_id', 'department_id', 'business_owner_id', 'start_at', 'end_at', 'description_en', 'description_ar','brief_en','brief_ar', 'slug_en', 'slug_ar', 'status'];
    
    
    public function categories()
    {
        return $this->hasMany('App\InitiativeCategory','initiative_id', 'id');
    }

}
