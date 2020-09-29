<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpuEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corpu_events', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');//training,e-leraning,webinar
            $table->string('divisi_kode');
            $table->string('departement_kode');
            $table->string('judul');
            $table->string('deskripsi');
            $table->date('mulai');
            $table->date('selesai');
            $table->string('tahun');
            // $table->string('');
            // $table->string('');

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
        Schema::dropIfExists('corpu_events');
    }
}
