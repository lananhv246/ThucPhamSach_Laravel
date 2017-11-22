<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_nos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_donhangno');
            $table->integer('id_phieu_xuat_kho_chi_tiet')->unsigned();
            $table->foreign('id_phieu_xuat_kho_chi_tiet') ->references('id') ->on('phieu_xuat_kho_chi_tiets')->onDelete('cascade') ;
            $table->integer('soluong_no');
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
        Schema::dropIfExists('don_hang_nos');
    }
}
