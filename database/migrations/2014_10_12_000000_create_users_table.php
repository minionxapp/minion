<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('name');//firtname
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone1')->nullable();
            $table->string('departemen')->nullable();
            $table->string('kd_unit_kerja')->nullable();
            $table->string('nama_unit_kerja')->nullable();
            $table->string('grade')->nullable();
            $table->string('picture')->nullable();
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('divisi_kode')->nullable();
            $table->string('bank')->nullable();
            $table->string('norek')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
