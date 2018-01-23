<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIntereses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_intereses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Lugar');
            $table->string('Tipo', 50);
            $table->string('RazonSocial')->nullable();
            $table->string('Frecuencia')->nullable();
            $table->string('PersonaJuridica')->nullable();
            $table->integer('titular_id')->nullable();
            $table->string('Vinculo')->nullable();
            $table->string('Antiguedad')->nullable();
            $table->string('Participacion')->nullable();
            $table->string('Aportacion')->nullable();
            $table->string('Ubicacion')->nullable();
            $table->date('Constitucion')->nullable();
            $table->string('Sector')->nullable();
            $table->decimal('Porcentaje', 5, 2)->nullable();
            
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
        Schema::dropIfExists('dec_intereses');
    }
}
