<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = "personales";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    
    
}
