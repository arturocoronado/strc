<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDecIntOpe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dec_intereses_ope', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interes_id');
            $table->date('Fecha');
            $table->tinyInteger('ope_id');
            $table->integer('declaracion_id')->nullable();
            
            $table->integer('procedencia_id')->nullable();
            
            $table->text('Observaciones')->nullable();
            
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
        Schema::dropIfExists('dec_intereses_ope');
    }
}
