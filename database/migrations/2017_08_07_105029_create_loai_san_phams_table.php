<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_loai');
            $table->integer('id_danhmuc')->unsigned();
            $table->foreign('id_danhmuc') ->references('id') ->on('danh_muc_loais')->onDelete('cascade') ;
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
        Schema::dropIfExists('loai_san_phams');
    }
}
