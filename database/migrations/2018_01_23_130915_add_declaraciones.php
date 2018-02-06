<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeclaraciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaraciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->date('Fecha');
            $table->string('Tipo', 10);
            $table->integer('personal_id');
            $table->integer('escolar_id');
            $table->integer('curricular_id');
            $table->integer('laboral_id');
            $table->decimal('Balance', 10, 2)->nullable();
            
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
        Schema::dropIfExists('declaraciones');
    }
}
