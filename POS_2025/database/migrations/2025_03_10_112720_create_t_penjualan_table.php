<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id'); // bigint(20) unsigned auto-increment
            $table->unsignedBigInteger('user_id'); // bigint(20) unsigned (foreign key ke tabel users)
            $table->string('pembeli', 50); // varchar(50) untuk nama pembeli
            $table->string('penjualan_kode', 20); // varchar(20) untuk kode penjualan
            $table->dateTime('penjualan_tanggal'); // datetime untuk tanggal penjualan
            $table->timestamps(); // created_at & updated_at (timestamp)

            $table->foreign('user_id')->references('user_id')->on('m_user');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
