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
        Schema::create('cashflow_subtotals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->foreignId('cashflow_group_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->unsignedTinyInteger('tahun');
            $table->unsignedTinyInteger('bulan');
            $table->integer('nominal')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflow_subtotals');
    }
};
