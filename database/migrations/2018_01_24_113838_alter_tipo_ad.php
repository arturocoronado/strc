<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTipoAd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tipo_ad');
        
        Schema::create('detalles_ope', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('ope_id');
            $table->string('Tipo', 50);
        });
        
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Contado'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Crédito'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Donación'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Herencia'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Permuta'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Sorteo'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Traspaso'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 1,
                    'Tipo'     => 'Cesión'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 2,
                    'Tipo'     => 'Venta'
                )
        );
        DB::table('detalles_ope')->insert(
                array(
                    'ope_id'   => 2,
                    'Tipo'     => 'Donación'
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
        Schema::dropIfExists('detalles_ope');
    }
}
