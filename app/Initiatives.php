<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiatives extends Model {

    protected $fillable = ['title_en', 'title_ar', 'where_en', 'where_ar', 'url_title', 'url', 'project_id', 'department_id', 'business_owner_id', 'start_at', 'end_at', 'description_en', 'description_ar', 'brief_en', 'brief_ar', 'slug_en', 'slug_ar', 'status'];

    public function categories() {
        return $this->hasMany('App\InitiativeCategory', 'initiative_id', 'id');
    }

    public function media() {
        //return $this->hasMany('App\InitiativeMedia', 'initiative_id', 'id');
        return $this->hasManyThrough('App\Media', 'App\InitiativeMedia','media_id', 'id');
        
        
        //select `media`.*, `initiative_media`.`initiatives_id` from `media` inner join `initiative_media` on `initiative_media`.`id` = `media`.`initiative_media_id` where `initiative_media`.`initiatives_id` = 9
    }

}
