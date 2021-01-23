<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;
    protected $table = "townships";
    protected $fillable = ['tsh_name_en','tsh_name_mm','tsh_short_code'];

     public function clinics(){
        return $this->hasMany('App\Models\ClinicHistory','tsh_id');
    }
}
