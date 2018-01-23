<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEscolares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nivel');
            $table->string('Estatus', 10);
            $table->string('Documento')->nullable();
            $table->string('Institucion')->nullable();
            $table->string('Nacional', 10)->nullable();
            $table->integer('ciudad_id')->nullable();
            $table->string('Carrera')->nullable();
            $table->string('Periodicidad', 50)->nullable();
            $table->tinyInteger('Cursados')->nullable();
            $table->string('Cedula')->nullable();
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
        Schema::dropIfExists('tipo_escolares');
    }
}
