<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLaborales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laborales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('dependencia_id');
            $table->integer('puesto_id');
            $table->text('Cargo');
            $table->string('Contratacion', 50);
            $table->string('Area')->nullable();
            $table->string('Nivel', 10)->nullable();
            $table->string('Telefono')->nullable();
            $table->decimal('Salario', 8, 2)->nullable();
            $table->text('Domicilio')->nullable();
            $table->integer('ciudad_id')->nullable();
            $table->string('ART64');
            $table->string('AG172');
            $table->date('Inicio');
            $table->date('Termino')->nullable();
            
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
        Schema::dropIfExists('laborales');
    }
}
