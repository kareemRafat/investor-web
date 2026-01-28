<?php

namespace App\Models;

use App\Enums\PlanType;
use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_type',
        'starts_at',
        'ends_at',
        'status',
    ];

    protected $casts = [
        'plan_type' => PlanType::class,
        'status' => SubscriptionStatus::class,
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isActive(): bool
    {
        return $this->status === SubscriptionStatus::ACTIVE && 
               $this->ends_at->isFuture();
    }
}
