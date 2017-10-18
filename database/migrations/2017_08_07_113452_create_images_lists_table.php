<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sanphamchitiet')->unsigned();
            $table->foreign('id_sanphamchitiet') ->references('id') ->on('san_pham_chi_tiets')->onDelete('cascade') ;
            $table->string('ten_image');
            $table->string('duongdan');
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
        Schema::dropIfExists('images_lists');
    }
}
