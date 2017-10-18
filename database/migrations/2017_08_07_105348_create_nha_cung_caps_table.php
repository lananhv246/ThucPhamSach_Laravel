<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaCungCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_caps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_ncc');
            $table->string('diachi');
            $table->string('dienthoai');
            $table->string('email');
            $table->integer('maso_thue');
            $table->string('ghichu');
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
        Schema::dropIfExists('nha_cung_caps');
    }
}
