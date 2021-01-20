<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic_Photo extends Model
{
    use HasFactory;
    protected $table = 'clinic_photos';
    protected $fillable = ['clinic_id','path','clinic_photo'];
}
