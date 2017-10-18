<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuNhapChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhap_chi_tiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_phieunhap')->unsigned();
            $table->foreign('id_phieunhap') ->references('id') ->on('phieu_nhaps')->onDelete('cascade') ;
            $table->integer('id_sanpham')->unsigned();
            $table->foreign('id_sanpham') ->references('id') ->on('san_phams')->onDelete('cascade') ;
            $table->integer('soluong');
            $table->integer('dongia');
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
        Schema::dropIfExists('phieu_nhap_chi_tiets');
    }
}
