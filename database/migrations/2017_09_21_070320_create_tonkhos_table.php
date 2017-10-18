<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTonkhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tonkhos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sanpham')->unsigned();
            $table->foreign('id_sanpham') ->references('id') ->on('san_phams')->onDelete('cascade') ;
            $table->integer('soluongton');
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
        Schema::dropIfExists('tonkhos');
    }
}
