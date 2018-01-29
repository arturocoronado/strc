<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProrrogas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prorrogas', function (Blueprint $table) {
            $table->renameColumn('usuario_id', 'laboral_id');
            $table->renameColumn('admin_id', 'valida_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prorrogas', function (Blueprint $table) {
            //
        });
    }
}
