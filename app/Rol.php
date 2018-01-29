<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Rol extends Model
{
    use SoftDeletes;
    use Userstamps;
    
    protected $table = "roles";
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public function usuario() {
        return $this->hasMany('App\Usuario', 'rol_id');
    }
}
