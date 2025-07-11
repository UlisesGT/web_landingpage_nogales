<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'is_approved',
        'approved_at',
        'approved_by',
        'metadata'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'approved_at' => 'datetime',
        'metadata' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'metadata'
    ];

    /**
     * Get the user that owns the review.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who approved the review.
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Scope a query to only include approved reviews.
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope a query to only include pending reviews.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('is_approved', false);
    }

    /**
     * Scope a query to filter by rating.
     */
    public function scopeByRating(Builder $query, int $rating): Builder
    {
        return $query->where('rating', $rating);
    }

    /**
     * Scope a query to get recent reviews.
     */
    public function scopeRecent(Builder $query, int $days = 30): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays($days));
    }

    /**
     * Get the avatar color based on user name.
     */
    public function getAvatarColorAttribute(): string
    {
        $colors = ['orange', 'blue', 'green', 'purple', 'red', 'yellow', 'indigo', 'pink'];
        $index = strlen($this->user->name) % count($colors);
        return $colors[$index];
    }

    /**
     * Get the formatted created date.
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('M d, Y');
    }

    /**
     * Get the time ago string.
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Approve the review.
     */
    public function approve(?int $approvedBy = null): bool
    {
        return $this->update([
            'is_approved' => true,
            'approved_at' => now(),
            'approved_by' => $approvedBy ?? auth()->id()
        ]);
    }

    /**
     * Reject the review.
     */
    public function reject(): bool
    {
        return $this->update([
            'is_approved' => false,
            'approved_at' => null,
            'approved_by' => null
        ]);
    }

    /**
     * Get the star rating as HTML.
     */
    public function getStarRatingHtmlAttribute(): string
    {
        $html = '';
        for ($i = 1; $i <= 5; $i++) {
            $class = $i <= $this->rating ? 'text-yellow-400' : 'text-gray-300';
            $html .= '<svg class="w-5 h-5 ' . $class . '" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                      </svg>';
        }
        return $html;
    }
} 