<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

// Este es para el login 
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable 
{
    use SoftDeletes;
    use Userstamps;
    
//Nombre definitivo de la tabla que afecta el modelo     
    protected $table = "usuarios";

//    Campos que se pueden afectar an la tabla
//    protected $fillable = array('Nombre, Correo, Password, Estatus');

//    Campos restringidos en la tabla 
    protected $guarded = ["Password_confirmation",'id'];
    
    // Bandera de borrado en las tablas 
    protected $dates = ['deleted_at'];
    
//    Relaciones con otros modelo 
    
    public function rol() {
        return $this->belongsTo('App\Rol', 'rol_id');
    }
    
    public function ente() {
        return $this->hasOne('App\Ente', 'id', 'ente_id');
    }
    
    public function laborales() {
        return $this->hasMany('App\Laboral', 'usuario_id');
    }
    
    public function escolares() {
        return $this->hasMany('App\Escolar', 'usuario_id');
    }
    
    public function curriculares() {
        return $this->hasMany('App\Curricular', 'usuario_id');
    }
    
    public function administra() {
        return $this->belongsTo('App\Ente', 'admin_id')->withDefault();
    }
}
