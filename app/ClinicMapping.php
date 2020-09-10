<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicMapping extends Model
{
    //
    protected $fillable = ['id','diagnosis_name', 'description', 'related_gender', 'category', 'prevalence', 'acuteness', 'severity', 'extras__icd10_code', 'extra_hint', 'triage_level', 'department_name', 'clinic_code', 'clinic_name', 'doc_hr_id', 'doctor_name'];

}
