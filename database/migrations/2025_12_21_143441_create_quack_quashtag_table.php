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
        Schema::create('quack_quashtag', function (Blueprint $table) {
            $table->foreignId('quack_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quashtag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->primary(['quack_id', 'quashtag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quack_quashtag');
    }
};
