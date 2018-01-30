<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Parametro extends Model {

    //
//    use SoftDeletes;
//    use Userstamps;

    protected $table = "parametros";
    protected $guarded = [];
    protected $dates = ['deleted_at'];

}
