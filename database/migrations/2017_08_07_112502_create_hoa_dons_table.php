<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_hoadon');
            $table->integer('id_khachhang')->unsigned();
            $table->foreign('id_khachhang') ->references('id') ->on('users')->onDelete('cascade') ;
            $table->integer('tonggia');
            $table->integer('tongsoluong');
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
        Schema::dropIfExists('hoa_dons');
    }
}
