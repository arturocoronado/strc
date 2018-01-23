<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Vehiculo', 50);
            $table->string('Marca');
            $table->string('Tipo');
            $table->string('Modelo', 10);
            $table->string('Serie')->nullable();
            $table->string('Nacional', 10);
            $table->string('Registro');
            $table->decimal('Valor', 10, 2);
            $table->integer('titular_id')->nullable();
            
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
        Schema::dropIfExists('dec_vehiculos');
    }
}
