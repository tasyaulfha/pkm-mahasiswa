<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulans', function (Blueprint $table) {
            $table->bigIncrements('id_usulan');
            $table->string('jenis_usulan');
            $table->integer('nim_mhs');
            $table->integer('id_tim');
            $table->string('judul_usulan');
            $table->string('skema_usulan');
            $table->longText('abstrak');
            $table->string('url_usulan');
            $table->integer('nidn_dosen');
            $table->date('tgl_submit');
            $table->string('status_usulan');

            $table-> softDeletes();
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
        Schema::dropIfExists('usulans');
    }
}
