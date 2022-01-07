<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ves', function (Blueprint $table) {
            $table->id('maVe');
            $table->string('taiKhoanNguoiDat');
            $table->bigInteger('maLichChieu');
            $table->integer('maGhe');
            $table->string('tenGhe');
            $table->string('stt');
            $table->bigInteger('giaVe');
            $table->string('loaiGhe');
            $table->boolean('daDat');
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
        Schema::dropIfExists('ves');
    }
}
