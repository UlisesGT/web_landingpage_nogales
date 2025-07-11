<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'order_type',
        'subtotal',
        'tax_amount',
        'delivery_fee',
        'total_amount',
        'items',
        'customer_info',
        'special_instructions',
        'estimated_ready_at',
        'completed_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'items' => 'array',
        'customer_info' => 'array',
        'estimated_ready_at' => 'datetime',
        'completed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include completed orders.
     */
    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to only include pending orders.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to filter by status.
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to get recent orders.
     */
    public function scopeRecent(Builder $query, int $days = 30): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays($days));
    }

    /**
     * Scope a query to get orders by type.
     */
    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('order_type', $type);
    }

    /**
     * Get the formatted total amount.
     */
    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format((float)$this->total_amount, 2);
    }

    /**
     * Get the formatted created date.
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('M d, Y g:i A');
    }

    /**
     * Get the status badge color.
     */
    public function getStatusBadgeColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-blue-100 text-blue-800',
            'preparing' => 'bg-orange-100 text-orange-800',
            'ready' => 'bg-green-100 text-green-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }

    /**
     * Get the items count.
     */
    public function getItemsCountAttribute(): int
    {
        return count($this->items);
    }

    /**
     * Mark the order as completed.
     */
    public function markAsCompleted(): bool
    {
        return $this->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);
    }

    /**
     * Cancel the order.
     */
    public function cancel(): bool
    {
        return $this->update(['status' => 'cancelled']);
    }

    /**
     * Update the order status.
     */
    public function updateStatus(string $status): bool
    {
        return $this->update(['status' => $status]);
    }

    /**
     * Check if the order is completed.
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if the order is cancelled.
     */
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    /**
     * Check if the order can be cancelled.
     */
    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Generate a unique order number.
     */
    public static function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('order_number', $number)->exists());
        
        return $number;
    }
} 