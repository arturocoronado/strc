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
            $table->string('Categoria')->nullable();
            $table->tinyInteger('Orden');
        });

        DB::table('parametros')->insert(
                array(
                    'id' => 1,
                    'Parametro' => 'Nombre del Director',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Nombre del representante del área que figura en los documentos',
                    'Tipo' => 'text',
                    'Orden' => 3
                )
        );
        DB::table('parametros')->Insert(
                array(
                    'id' => 2,
                    'Parametro' => 'Plazo Oficial de Declaración (días)',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Número de días hábiles permitidos para la presentación de las declaraciones',
                    'Tipo' => 'text',
                    'Orden' => 6
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 3,
                    'Parametro' => 'Manual de usuario',
                    'Categoria'=>'Archivos',
                    'Descripcion' => 'Archivo que contiene manual general para el usuario',
                    'Tipo' => 'pdf',
                    'Orden' => 7
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 4,
                    'Parametro' => 'Dirección correo electrónico oficial',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Dirección de correo electrónico para envios automáticos',
                    'Tipo' => 'text',
                    'Orden' => 8
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 5,
                    'Parametro' => 'Contraseña de correo electrónico',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Contraseña del correo oficial',
                    'Tipo' => 'password',
                    'Orden' => 9
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 6,
                    'Parametro' => 'Remitente de correo',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Nombre del remitente visible en los correos enviados',
                    'Tipo' => 'text',
                    'Orden' => 10
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 7,
                    'Parametro' => 'Host de correo',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Dirección del host SMTP para correo oficial',
                    'Tipo' => 'text',
                    'Orden' => 11
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 8,
                    'Parametro' => 'Puerto de correo',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Puerto destinado en el servidor para el envio de correos',
                    'Tipo' => 'text',
                    'Orden' => 12
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 9,
                    'Parametro' => 'Autenticación SMTP',
                    'Categoria'=>'Correo',
                    'Descripcion' => 'Determina si requiere autenticación SMTP para el envio',
                    'Tipo' => 'text',
                    'Orden' => 13
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 10,
                    'Parametro' => 'Nombre de la Dependencia',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Nombre de la dependencia encargada',
                    'Tipo' => 'text',
                    'Orden' => 1
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 11,
                    'Parametro' => 'Título de gobierno',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Título de gobierno',
                    'Tipo' => 'text',
                    'Orden' => 2
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 12,
                    'Parametro' => 'Información de contacto',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Datos de contacto mostrados en la parte inferior del sitio',
                    'Tipo' => 'textarea',
                    'Orden' => 15
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 13,
                    'Parametro' => 'Título del sitio',
                    'Categoria'=>'Generales',
                    'Descripcion' => 'Título mostrado en la parte superior del navegador',
                    'Tipo' => 'text',
                    'Orden' => 14
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 14,
                    'Parametro' => 'Logo de Gobierno',
                    'Categoria'=>'Archivos',
                    'Descripcion' => 'Logotipo oficial de gobierno',
                    'Tipo' => 'jpg,png,gif',
                    'Orden' => 16
        ));
        DB::table('parametros')->Insert(
                array(
                    'id' => 15,
                    'Parametro' => 'Logo de la Dependencia',
                    'Categoria'=>'Archivos',
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
