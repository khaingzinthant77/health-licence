<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistory extends Model
{
    use HasFactory;
    protected $table = "clinic_histories";
    protected $fillable = ['clinic_id','lic_id','sub_lic_id','tsh_id','lic_no','issue_date','duration','expire_date'];

    public function viewClinic()
    {
    	return $this->hasOne('App\Models\Clinic','id','clinic_id');
    }

    public function viewLicenceType()
    {
    	return $this->hasOne('App\Models\LicenceType','id','lic_id');
    }

    public function viewSubLicence()
    {
    	return $this->hasOne('App\Models\SubLicenceType','id','sub_lic_id');
    }

    public function viewTownship()
    {
    	return $this->hasOne('App\Models\Township','id','tsh_id');
    }
}
