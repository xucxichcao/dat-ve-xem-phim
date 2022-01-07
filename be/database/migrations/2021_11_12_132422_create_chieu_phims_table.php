<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChieuPhimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chieu_phims', function (Blueprint $table) {
            $table->id('maChieu');
            $table->string('maCumRap');
            $table->bigInteger('maPhim');
            $table->boolean('conChieu');
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
        Schema::dropIfExists('chieu_phims');
    }
}
