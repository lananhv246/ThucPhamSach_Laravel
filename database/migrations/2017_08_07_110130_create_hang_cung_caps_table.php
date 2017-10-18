<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHangCungCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hang_cung_caps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ncc')->unsigned();
            $table->foreign('id_ncc') ->references('id') ->on('nha_cung_caps')->onDelete('cascade') ;
            $table->integer('id_tram')->unsigned();
            $table->foreign('id_tram') ->references('id') ->on('tram_trung_chuyens')->onDelete('cascade') ;
            $table->string('giatri');
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
        Schema::dropIfExists('hang_cung_caps');
    }
}
