<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'google_id',
        'name',
        'email',
        'password',
        'phone',
        'job_title',
        'birth_date',
        'residence_country',
        'status',
        'role',
        'plan_type',
        'contact_credits',
        'credits_reset_at',
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
            'status' => UserStatus::class,
            'role' => UserRole::class,
            'plan_type' => \App\Enums\PlanType::class,
            'credits_reset_at' => 'datetime',
        ];
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function investors()
    {
        return $this->hasMany(Investor::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function contactUnlocks()
    {
        return $this->hasMany(ContactUnlock::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function completedTransactions()
    {
        return $this->hasMany(Transaction::class)->where('status', 'completed');
    }

    public function getNextRenewalAtAttribute()
    {
        return $this->subscriptions()
            ->where('status', \App\Enums\SubscriptionStatus::ACTIVE)
            ->latest()
            ->first()?->ends_at;
    }

    public function isPremium(): bool
    {
        return $this->plan_type !== \App\Enums\PlanType::FREE;
    }

    public function hasCredits(): bool
    {
        return $this->contact_credits > 0;
    }

    public function hasCompleteProfile(): bool
    {
        return ! empty($this->job_title) &&
               ! empty($this->phone) &&
               ! empty($this->residence_country) &&
               ! empty($this->birth_date);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notifyNow(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === UserRole::ADMIN;
    }
}
