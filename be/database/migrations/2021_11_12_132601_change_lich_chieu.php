<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLichChieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->renameColumn('maPhim', 'maChieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lich_chieus', function (Blueprint $table) {
            $table->renameColumn('maChieu', 'maPhim');
        });
    }
}
