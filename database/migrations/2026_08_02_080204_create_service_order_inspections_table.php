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
        Schema::create('service_order_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->unsignedTinyInteger('urutan')->default(1);
            $table->string('std_inspect_nama', 255);
            $table->unsignedTinyInteger('ischeck')->default(0);
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
        Schema::dropIfExists('service_order_inspections');
    }
};
