<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class About extends Authenticatable
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id','video','description_ar','description_en','created_at','updated_at'
     ];
}
