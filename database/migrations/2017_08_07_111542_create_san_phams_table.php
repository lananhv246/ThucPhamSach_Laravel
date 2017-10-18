<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_sanpham');
            $table->integer('id_loai')->unsigned();
            $table->foreign('id_loai') ->references('id') ->on('loai_san_phams')->onDelete('cascade') ;
            $table->integer('dongia');
            $table->string('donvitien');
            $table->string('donvitinh');
            $table->string('image');
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
        Schema::dropIfExists('san_phams');
    }
}
