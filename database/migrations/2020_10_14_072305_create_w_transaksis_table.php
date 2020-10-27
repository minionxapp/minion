<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('periode_kode');
            $table->string('user_id');
            $table->string('keterangan');
            $table->decimal('masuk', 12, 0);
            $table->decimal('keluar', 12, 0);
            $table->string('id_trans')->nullable();
            
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
        Schema::dropIfExists('w_transaksis');
    }
}
