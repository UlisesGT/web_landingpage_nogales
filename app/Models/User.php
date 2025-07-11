<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the orders for the user.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the reviews for the user.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the user's review (since only one is allowed).
     */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    /**
     * Get completed orders for the user.
     */
    public function completedOrders(): HasMany
    {
        return $this->orders()->completed();
    }

    /**
     * Check if the user has completed orders.
     */
    public function hasCompletedOrders(): bool
    {
        return $this->completedOrders()->exists();
    }

    /**
     * Check if the user has already left a review.
     */
    public function hasReview(): bool
    {
        return $this->review()->exists();
    }

    /**
     * Check if the user is eligible to leave a review.
     */
    public function canLeaveReview(): bool
    {
        return $this->hasCompletedOrders() && !$this->hasReview();
    }

    /**
     * Get the user's avatar color.
     */
    public function getAvatarColorAttribute(): string
    {
        $colors = ['orange', 'blue', 'green', 'purple', 'red', 'yellow', 'indigo', 'pink'];
        $index = strlen($this->name) % count($colors);
        return $colors[$index];
    }
}
