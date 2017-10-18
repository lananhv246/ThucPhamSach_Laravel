<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaChiKHsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachi_khachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_khachhang')->unsigned();
            $table->foreign('id_khachhang') ->references('id') ->on('users')->onDelete('cascade') ;
            $table->string('diachi');
            $table->string('dienthoai');
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
        Schema::dropIfExists('dia_chi_k_hs');
    }
}
