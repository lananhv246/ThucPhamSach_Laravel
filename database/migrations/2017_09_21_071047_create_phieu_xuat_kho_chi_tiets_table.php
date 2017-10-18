<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuXuatKhoChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_kho_chi_tiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tonkho')->unsigned();
            $table->foreign('id_tonkho') ->references('id') ->on('tonkhos')->onDelete('cascade') ;
            $table->integer('id_phieuxuatkho')->unsigned();
            $table->foreign('id_phieuxuatkho') ->references('id') ->on('phieu_xuat_khos')->onDelete('cascade') ;
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
        Schema::dropIfExists('phieu_xuat_kho_chi_tiets');
    }
}
