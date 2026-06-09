<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_mitra', function (Blueprint $table) {
            $table->id();
            $table->string('bidang');
            $table->string('kelompok');
            $table->string('judul');
            $table->string('kontrak');
            $table->string('perusahaan');
            $table->string('PIC');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
            $table->string('p5');
            $table->string('p6');
            $table->string('p7');
            $table->string('p8');
            $table->string('p9');
            $table->string('p10');
            $table->string('p11');
            $table->string('p12');
            $table->string('p13');
            $table->string('p14');
            $table->string('p15');
            $table->string('p16');
            $table->string('p17');
            $table->text('saran');
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
        Schema::dropIfExists('survey_mitra');
    }
}
