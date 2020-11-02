<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWDaftarBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_daftar_bayar', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('keterangan')->default('');
            $table->string('status')->default('');
            $table->decimal('jml_total', 12, 0);
            $table->date('tgl_pembayaran')->nullable();
            // $table->string('')->default('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
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
        Schema::dropIfExists('w_daftar_bayars');
    }
}
