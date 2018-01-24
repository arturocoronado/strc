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
                    'Permisos' => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17'
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
