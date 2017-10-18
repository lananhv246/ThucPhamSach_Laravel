<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuXuatKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_khos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_phieuxuatkho');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin') ->references('id') ->on('admins')->onDelete('cascade') ;
            $table->integer('id_khachhang')->unsigned();
            $table->foreign('id_khachhang') ->references('id') ->on('users')->onDelete('cascade') ;
            $table->integer('tongsoluong');
            $table->integer('tongtien');
            $table->integer('donvitien');
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
        Schema::dropIfExists('phieu_xuat_khos');
    }
}
