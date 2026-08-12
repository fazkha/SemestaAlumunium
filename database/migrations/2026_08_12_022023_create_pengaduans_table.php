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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->date('tanggal');
            $table->string('aduan', 255);
            $table->unsignedTinyInteger('isactive')->default(0);
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
        Schema::dropIfExists('pengaduans');
    }
};
