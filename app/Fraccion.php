<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Fraccion extends Model
{
    use SoftDeletes;
    use Userstamps;
    
//Nombre definitivo de la tabla que afecta el modelo     
    protected $table = "fracciones";

//    Campos que se pueden afectar an la tabla
//    protected $fillable = array('Nombre, Correo, Password, Estatus');
//    Campos restringidos en la tabla 
    protected $guarded = ['id'];
    
    
    // Bandera de borrado en las tablas cuando se usa softDeletes 
    protected $dates = ['deleted_at'];
    
//    Relaciones con otros modelo 
    
    public function usuarios() {
        return $this->hasMany('App\Usuario', 'id', 'fraccion_id');
    }
}
