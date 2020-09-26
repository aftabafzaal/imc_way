<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiatives extends Model {

    protected $fillable = ['title_en', 'title_ar', 'objective_en', 'objective_ar', 'where_en', 'where_ar', 'url_title_en', 'url_title_ar', 'url', 'url_title2_en', 'url_title2_ar', 'url2', 'url_title3_en', 'url_title3_ar', 'url3', 'years', 'project_id', 'department_id', 'business_owner_id', 'start_at', 'end_at', 'description_en', 'description_ar', 'brief_en', 'brief_ar', 'slug_en', 'slug_ar', 'status',"image","media_id"];

    public function categories() {
        return $this->hasMany('App\InitiativeCategory', 'initiative_id', 'id');
    }

    public function values() {
        return $this->hasMany('App\InitiativeValues', 'initiative_id', 'id');
    }

    public function deliverables() {
        return $this->hasMany('App\InitiativeDeliverables', 'initiative_id', 'id');
    }

    public function media() {
        return $this->hasManyThrough('App\Media', 'App\InitiativeMedia', 'media_id', 'id');
   }

}
