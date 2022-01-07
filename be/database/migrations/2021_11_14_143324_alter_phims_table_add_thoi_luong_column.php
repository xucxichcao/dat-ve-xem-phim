<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPhimsTableAddThoiLuongColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phims', function (Blueprint $table) {
            $table->bigInteger('thoiLuong');
        });
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->bigInteger('thoiLuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phims', function (Blueprint $table) {
            $table->dropColumn('thoiLuong');
        });
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->dropColumn('thoiLuong');
        });
    }
}
