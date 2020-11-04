<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWTransaksiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_transaksi_user', function (Blueprint $table) {
            $table->id();
            $table->string('periode_kode');
            $table->string('user_id');
            $table->string('jenis');//Training,Webinar,Buku,Tools
            $table->string('keterangan');
            $table->date('mulai');
            $table->date('akhir');
            $table->string('lokasi');
            $table->decimal('jml_training', 12, 0);
            $table->decimal('jml_lain', 12, 0);
            $table->decimal('jml_total', 12, 0);
            
            $table->string('status')->nullable()->default('');;
            $table->string('approve_by')->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->date('tgl_approve')->nullable();


            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->string('file1_jwb')->nullable();
            $table->string('file2_jwb')->nullable();
            $table->string('file3_jwb')->nullable();

            $table->string('nik_atasan');
            $table->string('nama_atasan');
            $table->date('tgl_atasan_approve')->nullable();

            $table->string('status_jwb')->default('');
            $table->string('catatan_jwb')->default('');;
            $table->string('daftar_bayar_id')->default('');;
            
            $table->string('bank')->default('');
            $table->string('norek')->default('');;
            

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
        Schema::dropIfExists('w_transaksi_users');
    }
}
