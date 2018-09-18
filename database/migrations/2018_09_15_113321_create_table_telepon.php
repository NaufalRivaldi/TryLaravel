<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTelepon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbtelepon', function (Blueprint $table) {
            $table->integer('id_siswa')->unsigned()->primary('id_siswa');
            $table->string('no_telp')->unique();
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('tbsiswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbtelepon');
    }
}
