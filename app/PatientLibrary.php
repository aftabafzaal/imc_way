<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientLibrary extends Model
{
    public function category(){
        return $this->belongsTo('App\PatientLibraryCategory');
    }
}
