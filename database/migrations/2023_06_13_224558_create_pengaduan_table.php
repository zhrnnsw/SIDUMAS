<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tingkatan_id')->default(1);
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->text('description');
            $table->string('image');
            $table->string('status')->default('Belum di Proses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tingkatan_id')->references('id')->on('tingkatan');
            $table->foreign('bidang_id')->references('id')->on('bidang')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pengaduan');
    }
};
