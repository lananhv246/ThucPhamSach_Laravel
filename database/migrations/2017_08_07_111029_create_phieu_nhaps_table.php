<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tram')->unsigned();
            $table->foreign('id_tram') ->references('id') ->on('tram_trung_chuyens')->onDelete('cascade') ;
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin') ->references('id') ->on('admins')->onDelete('cascade') ;
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
        Schema::dropIfExists('phieu_nhaps');
    }
}
