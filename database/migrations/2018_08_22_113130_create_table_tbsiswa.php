<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTbsiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbsiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nisn', 4)->unique();
            $table->string('nama_siswa', 30);
            $table->date('tgl_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->integer('id_kelas')->unsigned();
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
        Schema::dropIfExists('tbsiswa');
    }
}
