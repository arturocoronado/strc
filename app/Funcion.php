<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    protected $table = "funciones";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    
    
}
