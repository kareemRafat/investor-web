<?php

namespace App\Models;

use App\Models\IdeaCost;
use App\Enums\IdeaStatus;
use App\Models\IdeaProfit;
use App\Models\IdeaReturn;
use App\Models\IdeaExpense;
use App\Models\IdeaResource;
use App\Models\IdeaContribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Idea extends Model
{
    protected $fillable = [
        'idea_field',
        'summary',
        'user_id',
        'created_at',
        'status',
        'approved_at',
        'approved_by',
        'rejection_reason',
        'admin_note',
    ];

    protected $casts = [
        'status' => IdeaStatus::class,
        'approved_at' => 'datetime',
    ];


    //! Relations

    // Idea approver
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // idea owner
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countries()
    {
        return $this->morphMany(Countryable::class, 'countryable');
    }

    public function costs()
    {
        return $this->hasMany(IdeaCost::class);
    }

    public function profits()
    {
        return $this->hasMany(IdeaProfit::class);
    }

    public function resources()
    {
        return $this->hasOne(IdeaResource::class);
    }

    public function expenses()
    {
        return $this->hasOne(IdeaExpense::class);
    }

    public function contributions()
    {
        return $this->hasMany(IdeaContribution::class);
    }

    public function returns()
    {
        return $this->hasOne(IdeaReturn::class);
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function isPending(): bool
    {
        return $this->status === IdeaStatus::PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === IdeaStatus::APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === IdeaStatus::REJECTED;
    }
}
