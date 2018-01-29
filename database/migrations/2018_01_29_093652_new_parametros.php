<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewParametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('parametros');

        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Parametro');
            $table->string('Descripcion')->nullable();
            $table->string('Tipo');
            $table->tinyInteger('Orden');
        });

        DB::table('parametros')->insert(
                array(
                    'id' => 1,
                    'Parametro' => 'Nombre del Director',
                    
                    'Descripcion' => 'Nombre del representante del área que figura en los documentos',
                    'Tipo' => 'text',
                    'Orden' => 3
                )
        );
        DB::table('parametros')->Insert(
                array(
                    'id' => 2,
                    'Parametro' => 'Plazo Oficial de Declaración (días)',
                    
                    'Descripcion' => 'Número de días hábiles permitidos para la presentación de las declaraciones',
                    'Tipo' => 'text',
                    'Orden' => 6
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 3,
                    'Parametro' => 'Manual de usuario',
                    
                    'Descripcion' => 'Archivo que contiene manual general para el usuario',
                    'Tipo' => 'pdf',
                    'Orden' => 7
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 4,
                    'Parametro' => 'Dirección correo electrónico oficial',
                    
                    'Descripcion' => 'Dirección de correo electrónico para envios automáticos',
                    'Tipo' => 'text',
                    'Orden' => 8
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 5,
                    'Parametro' => 'Contraseña de correo electrónico',
                    
                    'Descripcion' => 'Contraseña del correo oficial',
                    'Tipo' => 'password',
                    'Orden' => 9
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 6,
                    'Parametro' => 'Remitente de correo',
                    
                    'Descripcion' => 'Nombre del remitente visible en los correos enviados',
                    'Tipo' => 'text',
                    'Orden' => 10
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 7,
                    'Parametro' => 'Host de correo',
                    
                    'Descripcion' => 'Dirección del host SMTP para correo oficial',
                    'Tipo' => 'text',
                    'Orden' => 11
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 8,
                    'Parametro' => 'Puerto de correo',
                    
                    'Descripcion' => 'Puerto destinado en el servidor para el envio de correos',
                    'Tipo' => 'text',
                    'Orden' => 12
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 9,
                    'Parametro' => 'Autenticación SMTP',
                    
                    'Descripcion' => 'Determina si requiere autenticación SMTP para el envio',
                    'Tipo' => 'text',
                    'Orden' => 13
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 10,
                    'Parametro' => 'Nombre de la Dependencia',
                    
                    'Descripcion' => 'Nombre de la dependencia encargada',
                    'Tipo' => 'text',
                    'Orden' => 1
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 11,
                    'Parametro' => 'Título de gobierno',
                    
                    'Descripcion' => 'Título de gobierno',
                    'Tipo' => 'text',
                    'Orden' => 2
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 12,
                    'Parametro' => 'Información de contacto',
                    
                    'Descripcion' => 'Datos de contacto mostrados en la parte inferior del sitio',
                    'Tipo' => 'textarea',
                    'Orden' => 15
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 13,
                    'Parametro' => 'Título del sitio',
                    
                    'Descripcion' => 'Título mostrado en la parte superior del navegador',
                    'Tipo' => 'text',
                    'Orden' => 14
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 14,
                    'Parametro' => 'Logo de Gobierno',
                    
                    'Descripcion' => 'Logotipo oficial de gobierno',
                    'Tipo' => 'jpg,png,gif',
                    'Orden' => 16
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 15,
                    'Parametro' => 'Logo de la Dependencia',
                    
                    'Descripcion' => 'Logotipo oficial de la dependencia',
                    'Tipo' => 'jpg,png,gif',
                    'Orden' => 17
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametros');
    }
}
