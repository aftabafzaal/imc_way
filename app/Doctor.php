<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public function languages(){
        return $this->hasMany('App\Doctor_language');
    } 

    public function categories(){
        return $this->hasMany('App\Doctor_category');
    } 

    public function educations(){
        return $this->hasMany('App\Doctor_education');
    } 

    public function experiences(){
        return $this->hasMany('App\Doctor_experience');
    } 

    public function department(){
        return $this->belongsTo('App\Department');
    } 
}
