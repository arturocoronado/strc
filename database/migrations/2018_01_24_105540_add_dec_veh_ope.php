<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDecVehOpe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_vehiculos_ope', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehiculo_id');
            $table->date('Fecha');
            $table->tinyInteger('ope_id');
            $table->tinyInteger('tipo_ad')->nullable();
            $table->integer('declaracion_id')->nullable();
            
            $table->integer('donador_id')->nullable();
            $table->string('Otro_Donador')->nullable();
            
            $table->string('Tipo_Venta', 10)->nullable();
            $table->date('Fecha_Venta')->nullable();
            $table->decimal('Valor_Venta', 10, 2)->nullable();
            
            $table->string('Tipo_Siniestro', 50)->nullable();
            $table->date('Fecha_Siniestro')->nullable();
            $table->decimal('Valor_Siniestro', 10, 2)->nullable();
            
            $table->text('Observaciones')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dec_vehiculos_ope');
    }
}
