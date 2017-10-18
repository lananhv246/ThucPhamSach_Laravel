<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_chi_tiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hoadon')->unsigned();
            $table->foreign('id_hoadon') ->references('id') ->on('hoa_dons')->onDelete('cascade') ;
            $table->integer('id_sanpham')->unsigned();
            $table->foreign('id_sanpham') ->references('id') ->on('san_phams')->onDelete('cascade') ;
            $table->integer('soluong');
            $table->integer('dongia');
            $table->integer('thue');
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
        Schema::dropIfExists('hoa_don_chi_tiets');
    }
}
