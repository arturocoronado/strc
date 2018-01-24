<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::dropIfExists('roles');
        
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Rol');
            $table->string('Permisos');
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
        
        DB::table('roles')->insert(
                array(
                    'id'   => 1,
                    'Rol'     => 'Master', 
                    'Permisos' => '1@G|3@G1@G|4@G|5@G|6@G|7@G|8@G|9@G|10@G|11@G|12@G|13@G|14@G|15@G|16@G|17@G'
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
        Schema::dropIfExists('roles');
    }
}
