<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Puesto extends Model
{
    use SoftDeletes;
    use Userstamps;
    
//Nombre definitivo de la tabla que afecta el modelo     
    protected $table = "puestos";

//    Campos restringidos en la tabla 
    protected $guarded = ['id'];
    
    // Bandera de borrado en las tablas cuando se usa softDeletes 
    protected $dates = ['deleted_at'];
    
//    Relaciones con otros modelo 
    
    public function usuarios() {
        return $this->hasMany('App\Usuario', 'id', 'puesto_id');
    }
}
