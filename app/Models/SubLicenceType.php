<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLicenceType extends Model
{
    use HasFactory;
    protected $table = "sub_licence_types";
    protected $fillable = ['sub_lic_name','sub_lic_short'];
}
