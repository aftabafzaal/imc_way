<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function eventcourses(){
        return $this->hasMany('App\Eventcourse');
    } 

    public function eventspeakers(){
        return $this->hasMany('App\Eventspeaker');
    } 

    public function eventbanner(){
        return $this->hasMany('App\Eventbanner');
    } 
    
}
