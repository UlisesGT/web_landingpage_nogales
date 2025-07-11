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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('rating')->comment('Rating from 1 to 5');
            $table->text('comment');
            $table->boolean('is_approved')->default(false);
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->json('metadata')->nullable()->comment('Additional review metadata');
            $table->timestamps();
            
            // Índices para mejorar performance
            $table->index(['user_id', 'created_at']);
            $table->index(['rating', 'is_approved']);
            $table->index(['is_approved', 'created_at']);
            
            // Constraint para asegurar que rating esté entre 1 y 5
            // $table->check(['rating' => 'rating >= 1 AND rating <= 5']);
            
            // Única review por usuario
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
