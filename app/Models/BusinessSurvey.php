<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSurvey extends Model
{
    use HasFactory;

    protected $table="business_surveys";
    protected $guarded = [];
}
