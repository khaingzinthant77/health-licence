<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = "clinics";
    protected $fillable = ['clinic_name','clinic_address','owner','nrc','address','phone','path','owner_photo','tsh_id','expire_date'];

    public function viewHistory()
    {
    	return $this->hasMany('App\Models\ClinicHistory');
    }

    public function viewTownship()
    {
    	return $this->hasOne('App\Models\Township','id','tsh_id');
    }
}
