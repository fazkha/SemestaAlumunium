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
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashflow_group_id')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->string('nama', 100);
            $table->unsignedTinyInteger('group')->nullable();
            $table->unsignedTinyInteger('urutan')->nullable();
            $table->unsignedTinyInteger('isactive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflows');
    }
};
