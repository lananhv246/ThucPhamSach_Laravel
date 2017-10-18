<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham_chi_tiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sanpham')->unsigned();
            $table->foreign('id_sanpham') ->references('id') ->on('san_phams')->onDelete('cascade') ;
            $table->string('mieuta');
            $table->string('danhgia');
            $table->string('chebien');
            $table->string('thanhphan');
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
        Schema::dropIfExists('san_pham_chi_tiets');
    }
}
