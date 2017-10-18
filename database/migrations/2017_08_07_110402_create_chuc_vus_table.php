<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChucVusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuc_vus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin') ->references('id') ->on('admins')->onDelete('cascade') ;
            $table->string('ten_chucvu');
            $table->string('quyen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuc_vus');
    }
}
