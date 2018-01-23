<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDecDepend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_dependientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Parentesco', 50);
            $table->string('Nombre');
            $table->string('Paterno');
            $table->string('Materno');
            $table->string('Nacional', 10);
            $table->string('CURP', 50)->nullable();
            $table->tinyInteger('Depende')->default(1);
            $table->tinyInteger('ServidorPublico')->default(0);
            $table->string('Dependencia')->nullable();
            $table->string('Periodo')->nullable();
            $table->tinyInteger('MismoDomicilio')->default(1);
            $table->string('Calle')->nullable();
            $table->string('Numero')->nullable();
            $table->string('Colonia')->nullable();
            $table->integer('ciudad_id')->nullable();
            
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
        Schema::dropIfExists('dec_dependientes');
    }
}
