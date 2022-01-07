<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cum_raps', function (Blueprint $table) {
            // $table->string('maHeThongRap')->change();
            $table->foreign('maHeThongRap')->references('maHeThongRap')->on('he_thong_raps')->onDelete('cascade');
        });
        Schema::table('raps', function (Blueprint $table) {
            $table->foreign('maCumRap')->references('maCumRap')->on('cum_raps')->onDelete('cascade');
        });
        Schema::table('chieu_phims', function (Blueprint $table) {
            $table->bigInteger('maPhim')->unsigned()->change();
            $table->foreign('maPhim')->references('maPhim')->on('phims')->onDelete('cascade');
            $table->foreign('maCumRap')->references('maCumRap')->on('cum_raps')->onDelete('cascade');
        });
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->bigInteger('maChieu')->unsigned()->change();
            $table->bigInteger('maRap')->unsigned()->change();
            $table->foreign('maChieu')->references('maChieu')->on('chieu_phims')->onDelete('cascade');
            $table->foreign('maRap')->references('maRap')->on('raps')->onDelete('cascade');
        });
        Schema::table('ves', function (Blueprint $table) {
            $table->bigInteger('maLichChieu')->unsigned()->change();
            $table->foreign('maLichChieu')->references('maLichChieu')->on('lich_chieus')->onDelete('cascade');
            $table->foreign('taiKhoanNguoiDat')->references('taiKhoan')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cum_raps', function (Blueprint $table) {
            $table->dropForeign(['maHeThongRap']);
        });
        Schema::table('raps', function (Blueprint $table) {
            $table->dropForeign(['maCumRap']);
        });
        Schema::table('chieu_phims', function (Blueprint $table) {
            $table->dropForeign(['maCumRap']);
            $table->dropForeign(['maPhim']);
        });
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->dropForeign(['maChieu']);
            $table->dropForeign(['maRap']);
        });
        Schema::table('ves', function (Blueprint $table) {
            $table->dropForeign(['maLichChieu']);
            $table->dropForeign(['taiKhoanNguoiDat']);
        });
    }
}
