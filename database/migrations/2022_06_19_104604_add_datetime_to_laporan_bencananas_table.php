<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatetimeToLaporanBencananasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporan_bencanas', function (Blueprint $table) {
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('kerusakan');
            $table->string('kerugian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporan_bencanas', function (Blueprint $table) {
            //
        });
    }
}
