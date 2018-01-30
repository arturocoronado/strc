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
<<<<<<< HEAD
    protected $guarded = [];
    protected $dates = ['deleted_at'];  
=======
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
>>>>>>> 13ca226d3c09c34de9c57b2fb74d8403b14824b5
    
    public function usuario() {
        return $this->hasMany('App\Usuario', 'rol_id');
    }
}
