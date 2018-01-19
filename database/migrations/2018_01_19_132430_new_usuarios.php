<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('usuarios');
        
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id');
            $table->enum('Tipo', ['GLOBAL', 'REST'])->nullable();
            $table->string('Nombre');
            $table->string('Paterno');
            $table->string('Materno');
            $table->string('RFC', 13);
            $table->string('CURP', 20)->nullable();
            $table->string('Nacionalidad', 50)->nullable();
            $table->date('Nacimiento')->nullable();
            $table->string('Lugar_nacimiento')->nullable();
            
            $table->string('Correo');
            $table->string('Correo_alterno')->nullable();
            $table->string('Password');
            $table->tinyInteger('Pwd_nuevo')->default(1);
            $table->tinyInteger('Estatus');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
        
        DB::table('usuarios')->insert(
            array(
                'rol_id' => 1,
                'Tipo' => 'GLOBAL',
                'Nombre' => 'Master',
                'Paterno' => 'Desarrollo',
                'Materno' => 'Desarrollo',
                'RFC' => 'ABCD123456789',
                'Correo' => 'declaranet@guanajuato.gob.mx',
                'Password' => md5('123'),
                'Estatus' => 1
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
