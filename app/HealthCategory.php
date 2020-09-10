<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class HealthCategory extends Authenticatable
{
/***
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'created_at','updated_at'
     ];
}
