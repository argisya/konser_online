<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konser_id');
            $table->string('nama');
            $table->string('email');
            $table->integer('jumlah');
            $table->string('kelas');
            $table->integer('total');
            $table->string('metode')->default('QRIS');
            $table->string('status')->default('pending'); // pending / lunas
            $table->timestamp('expired_at')->nullable();   // untuk countdown 2 menit
            $table->timestamps();

            $table->foreign('konser_id')->references('id')->on('concerts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};