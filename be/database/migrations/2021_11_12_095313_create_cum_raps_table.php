<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumRapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cum_raps', function (Blueprint $table) {
            $table->id();
            $table->string('maCumRap')->unique();
            $table->string('tenCumRap');
            $table->string('diaChi');
            $table->string('maHeThongRap');
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
        Schema::dropIfExists('cum_raps');
    }
}
