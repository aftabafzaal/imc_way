<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Item extends Authenticatable
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id','user_id','item',
     ];
}
