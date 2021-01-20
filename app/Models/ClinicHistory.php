<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistory extends Model
{
    use HasFactory;
    protected $table = "clinic_histories";
    protected $fillable = ['clinic_id','lic_id','sub_lic_id','tsh_id','lic_no','issue_date','duration','expire_date'];
}
