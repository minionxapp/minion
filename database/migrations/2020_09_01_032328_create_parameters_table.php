<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter', function (Blueprint $table) {
            $table->id();
            $table->string('param_id');
            $table->string('group_id')->nullable();
            $table->string('group_desc')->nullable();
            $table->string('param_value')->nullable();
            $table->string('param_label')->nullable();
            $table->string('param_desc')->nullable();
            $table->integer('param_urut')->nullable();
            // $table->int();
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
        Schema::dropIfExists('parameters');
    }
}
