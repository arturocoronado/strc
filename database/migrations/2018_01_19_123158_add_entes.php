<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEntes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dependencias');
        
        Schema::create('entes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->enum('Tipo', ['Centralizada', 'Paraestatal', 'Municipio']);
            $table->string('Siglas')->nullable();
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
        Schema::dropIfExists('entes');
    }
}
