<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLaborales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('laborales');
        
        Schema::create('laborales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('ente_id');
            $table->integer('puesto_id');
            $table->text('Cargo')->nullable();
            $table->integer('contratacion_id');
            $table->string('Nivel', 10)->nullable();
            
            $table->decimal('Salario', 8, 2)->nullable();
            $table->string('Area')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('Extension', 50)->nullable();
            $table->string('Calle_trabajo')->nullable();
            $table->string('Numero_trabajo')->nullable();
            $table->string('Colonia_trabajo')->nullable();
            $table->integer('ciudad_id')->nullable();
            
            $table->string('ART64')->nullable();
            $table->string('AG172')->nullable();
            
            $table->date('Inicio');
            $table->date('Termino')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
        
        DB::table('laborales')->Insert(
                array(
                    'usuario_id' => 1,
                    'ente_id'    => 1, 
                    'puesto_id'  => 1, 
                    'contratacion_id'  => 1, 
                    'Area'  => 'TI', 
                    'Inicio'  => '2018-01-01', 

        ));
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
