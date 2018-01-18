<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Calle');
            $table->string('NumeroExt', 50);
            $table->string('NumeroInt', 50);
            $table->string('Colonia');
            $table->integer('CP')->nullable();
            $table->integer('ciudad_id');
            $table->string('Telefono')->nullable();
            $table->string('Civil')->nullable();
            $table->string('ID')->nullable();
            $table->string('Clave')->nullable();
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
        Schema::dropIfExists('personales');
    }
}
