<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTipoOp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tipo_op');
        Schema::dropIfExists('tipo_ope');
        
        Schema::create('tipo_ope', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Operacion');
            $table->string('Aplicacion');
        });
        
       
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 1,
                    'Operacion'     => 'Incorporación', 
                    'Aplicacion'    => 'dependientes,inmuebles,muebles,vehiculos,inversiones,adeudos,intereses'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 2,
                    'Operacion'     => 'Erogación', 
                    'Aplicacion'    => 'inmuebles,muebles,vehiculos'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 3,
                    'Operacion'     => 'Modificación', 
                    'Aplicacion'    => 'dependientes,intereses'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 4,
                    'Operacion'     => 'Eliminación', 
                    'Aplicacion'    => 'dependientes,intereses'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 5,
                    'Operacion'     => 'Depósito', 
                    'Aplicacion'    => 'inversiones,adeudos'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 6,
                    'Operacion'     => 'Retiro', 
                    'Aplicacion'    => 'inversiones'
                )
        );
        DB::table('tipo_ope')->insert(
                array(
                    'id'            => 7,
                    'Operacion'     => 'Siniestro', 
                    'Aplicacion'    => 'inmuebles,muebles,vehiculos'
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_ope');
    }
}
