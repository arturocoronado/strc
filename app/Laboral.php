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
}
