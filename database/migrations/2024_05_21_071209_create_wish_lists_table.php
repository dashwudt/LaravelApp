<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacation_spot_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            // Add a unique constraint on user_id and vacation_spot_id
            $table->unique(['user_id', 'vacation_spot_id'], 'user_vacation_spot_unique');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('wish_lists');
    }
};
