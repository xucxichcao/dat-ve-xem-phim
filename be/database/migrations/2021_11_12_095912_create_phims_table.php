<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phims', function (Blueprint $table) {
            $table->id('maPhim');
            $table->string('tenPhim');
            $table->string('biDanh');
            $table->string('trailer');
            $table->string('hinhAnh');
            $table->string('moTa');
            $table->boolean('dangChieu');
            $table->dateTime('ngayKhoiChieu');
            $table->decimal('danhGia');
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
        Schema::dropIfExists('phims');
    }
}
