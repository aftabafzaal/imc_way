<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_language extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function language(){
        return $this->belongsTo('App\Language',"language_id","id");
    } 
   
    public function doctor(){
        return $this->belongsTo('App\Doctor',"doctor_id","id");
    } 
}
