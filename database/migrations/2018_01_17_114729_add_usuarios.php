<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dependencia_id');
            $table->integer('rol_id');
            $table->string('Nombre');
            $table->string('Paterno');
            $table->string('Materno');
            $table->string('RFC', 13);
            $table->string('Password');
            $table->tinyInteger('Estatus');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
        
        // Insert some stuff
    DB::table('usuarios')->insert(
        array(
            'dependencia_id' => 1,
            'rol_id' => 1,
            'Nombre' => 'Master',
            'Paterno' => 'Desarrollo',
            'Materno' => 'Desarrollo',
            'RFC' => 'ABCD123456789',
            'Password' => md5('123'),
            'Estatus' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d H:i:s')
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
