<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurriculares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Sector');
            $table->string('Poder', 20)->nullable();
            $table->string('Ambito', 20)->nullable();
            $table->string('Lugar')->nullable();
            $table->string('Area')->nullable();
            $table->string('Cargo')->nullable();
            $table->text('Funcion')->nullable();
            $table->date('Inicio')->nullable();
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
        Schema::dropIfExists('curriculares');
    }
}
