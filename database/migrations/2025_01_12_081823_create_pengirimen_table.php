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
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->string('alamat_pengiriman')->nullable();
            $table->string('metode_pengiriman')->nullable();
            $table->date('waktu_pengiriman');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->integer('biaya_pengiriman')->default(0);
            $table->string('no_resi')->nullable();
            $table->string('status_pengiriman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimans');
    }
};
