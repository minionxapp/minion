<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_periode', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama')->nullable();
            $table->string('descripsi')->nullable();
            $table->date('awal');
            $table->date('akhir');
            $table->decimal('sawal', 12, 0);
            $table->decimal('sakhir', 12, 0);
            // $table->string('')->nullable();
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
        Schema::dropIfExists('w_periodes');
    }
}
