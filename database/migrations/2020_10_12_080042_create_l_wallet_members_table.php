<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLWalletMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_members', function (Blueprint $table) {
            $table->id();
            $table->string('periode_kode');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('divisi_kode');
            $table->string('divisi_nama');
            $table->string('departemen_kode');
            $table->string('departemen_nama');
            $table->decimal('sawal', 12, 0);
            $table->decimal('sakhir', 12, 0);
            $table->string('status');
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
        Schema::dropIfExists('l_wallet_members');
    }
}
