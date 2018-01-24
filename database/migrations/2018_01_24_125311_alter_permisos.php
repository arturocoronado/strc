<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('permisos');
        
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Modulo');
            $table->string('Permiso');
        });
        
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Catálogos', 
                    'Permiso'    => 'Administrar entes'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Catálogos', 
                    'Permiso'    => 'Administrar puestos'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Catálogos', 
                    'Permiso'    => 'Administrar fracciones'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Padrón', 
                    'Permiso'    => 'Crear altas de personal'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Padrón', 
                    'Permiso'    => 'Gestionar claves y movimientos'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Padrón', 
                    'Permiso'    => 'Gestionar recordatorios y convenios'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Padrón', 
                    'Permiso'    => 'Administrar prórrogas'
                )
        );
        DB::table('permisos')->insert(
                array(
                    'Modulo'     => 'Usuarios', 
                    'Permiso'    => 'Administrar roles y usuarios'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Opciones', 
                    'Permiso'    => 'Editar opciones del sistema'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Verificación', 
                    'Permiso'    => 'Crear nueva verificacion'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Verificación', 
                    'Permiso'    => 'Consultar listado de verificación'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Verificación', 
                    'Permiso'    => 'Consultar procedimientos'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Verificación', 
                    'Permiso'    => 'Acceder a declaraciones'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Reportes', 
                    'Permiso'    => 'Ver reporte de declaraciones'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Reportes', 
                    'Permiso'    => 'Ver reporte de cumplimiento'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Reportes', 
                    'Permiso'    => 'Ver reporte de padrón'
                )
        );
        DB::table('permisos')->insert(
                array(
                    
                    'Modulo'     => 'Reportes', 
                    'Permiso'    => 'Ver reporte de casos omisos'
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
        Schema::dropIfExists('permisos');
    }
}
