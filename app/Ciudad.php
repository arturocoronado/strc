<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    protected $guarded = ['id'];
    
    public function estado() {
        return $this->belongsTo('App\Estado', 'estado_id')->withDefault();
    }
}
