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
        Schema::create('service_order_perawatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('jenis_perawatan_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onUpdate('cascade')->onDelete('no action');
            $table->unsignedInteger('harga_satuan')->default(0);
            $table->decimal('kuantiti', 8, 2)->default(0);
            $table->string('keterangan', 255)->nullable();
            $table->string('lokasi', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->string('created_by', 255)->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_order_perawatans');
    }
};
