<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbkelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas', 20);
            $table->timestamps();
        });

        Schema::table('tbsiswa', function(Blueprint $table){
            $table->foreign('id_kelas')->references('id')->on('tbkelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbsiswa', function(Blueprint $table){
            $table->dropForeign('tbsiswa_id_kelas_foreign');
        });
        Schema::dropIfExists('tbkelas');
    }
}
