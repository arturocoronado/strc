<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInversiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_inversiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->string('Tipo', 50);
            $table->string('Nacional', 10);
            $table->string('Institucion');
            $table->decimal('Valor', 10, 2);
            $table->string('Moneda', 10);
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
        Schema::dropIfExists('inversiones');
    }
}
