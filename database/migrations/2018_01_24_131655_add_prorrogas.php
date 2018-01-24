<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProrrogas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prorrogas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->date('Fecha_Pro');
            $table->text('Motivo');
            $table->text('Documento');
            $table->date('Fecha_Aut')->nullable();
            $table->text('Respuesta')->nullable();
            $table->integer('admin_id')->nullable();
            $table->tinyInteger('Estatus')->default(1);
            
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
        Schema::dropIfExists('prorrogas');
    }
}
