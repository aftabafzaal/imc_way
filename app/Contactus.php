<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table  = "contact_us";
    protected $fillable = [
        'name', 'email', 'mobile', 'subject', 'message'
     ];
}
