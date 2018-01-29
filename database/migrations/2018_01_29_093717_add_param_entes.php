<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParamEntes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros_valores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parametro_id');
            $table->integer('ente_id')->default(0);
            $table->string('Valor');
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
        
       DB::table('parametros_valores')->insert(
                array(
                    'parametro_id' => 1,
                    'ente_id'   => 0,
                    'Valor' => 'Lic. Patricia Cabrera Hidalgo',
                    
                )
        );
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 2,
                    'ente_id'   => 0,
                    'Valor' => '60',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 3,
                    'ente_id'   => 0,
                    'Valor' => 'media/ManualUsuario.pdf',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 4,
                    'ente_id'   => 0,
                    'Valor' => 'notificaciones_strc@techgto.com',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 5,
                    'ente_id'   => 0,
                    'Valor' => 'AdM1nM@1L001',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 6,
                    'ente_id'   => 0,
                    'Valor' => 'Declaranet Guanajuato',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 7,
                    'ente_id'   => 0,
                    'Valor' => 'email-smtp.us-east-1.amazonaws.com',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 8,
                    'ente_id'   => 0,
                    'Valor' => '587',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 9,
                    'ente_id'   => 0,
                    'Valor' => 'true',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 10,
                    'ente_id'   => 0,
                    'Valor' => 'Secretaría de la Transparencia y Rendición de Cuentas',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 11,
                    'ente_id'   => 0,
                    'Valor' => 'Gobierno del Estado de Guanajuato',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 12,
                    'ente_id'   => 0,
                    'Valor' => 'Secretaría de la Transparencia y Rendición de Cuentas <br> Conjunto Administrativo Pozuelos s/n C.P. 36080 Guanajuato, Gto. <br> Tel. 01 (473)  735-13-64 y LADA SIN COSTO 01 (800) 506 16 16',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 13,
                    'ente_id'   => 0,
                    'Valor' => 'Declaranet PLUS Guanajuato',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 14,
                    'ente_id'   => 0,
                    'Valor' => 'img/LogoGobierno.png',
                    
        ));
        DB::table('parametros_valores')->Insert(
                array(
                    'parametro_id' => 15,
                    'ente_id'   => 0,
                    'Valor' => 'img/LogoDependencia.png',
                    
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametros_valores');
    }
}
