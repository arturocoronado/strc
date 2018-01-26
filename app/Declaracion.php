<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaracion extends Model
{
    protected $table = "declaraciones";
    
    protected $guarded = ['id'];
    
    protected $dates = ['deleted_at'];
    
    public function usuario() {
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }
}
