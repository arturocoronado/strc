<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboral extends Model
{
    protected $table = "laborales";
            
    protected $guarded = ['id'];
    
    protected $dates = ['deleted_at', 'Inicio', 'Termino'];
    
    public function usuario() {
        return $this->belongsTo('App\Usuario', 'usuario_id')->withDefault();
    }
    
    public function ente() {
        return $this->belongsTo('App\Ente', 'ente_id')->withDefault();
    }
    
    public function puesto(){
        return $this->belongsTo('App\Puesto', 'puesto_id')->withDefault();
    }
    
    public function declaraciones() {
        return $this->hasMany('App\Declaracion', 'laboral_id');
    }
    
    public function contratacion() {
        return $this->belongsTo('App\Contratacion', 'contratacion_id')->withDefault();
    }
    
    public function funciones() {
        return $this->belongsToMany('App\Funcion', 'laborales_funciones', 'laboral_id');
    }
    
    public function ciudad() {
        return $this->belongsTo('App\Ciudad', 'ciudad_id')->withDefault();
    }
    
    public function FullAddress(){
        return trim($this->Calle_trabajo . " " . $this->Numero_trabajo . " " . $this->Colonia_trabajo . ", " . $this->ciudad->Ciudad);
    }
}
