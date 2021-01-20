<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenceType extends Model
{
    use HasFactory;
    protected $table = "licence_types";
    protected $fillable = ['lic_name','rule_no','short_name'];
}
