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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'preparing', 'ready', 'completed', 'cancelled'])
                  ->default('pending');
            $table->enum('order_type', ['delivery', 'pickup', 'dine_in'])->default('pickup');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->json('items')->comment('Order items details');
            $table->json('customer_info')->comment('Customer contact and delivery info');
            $table->text('special_instructions')->nullable();
            $table->timestamp('estimated_ready_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            // Índices para mejorar performance
            $table->index(['user_id', 'status']);
            $table->index(['status', 'created_at']);
            $table->index(['order_number']);
            $table->index(['completed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}; 