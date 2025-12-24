<?php

namespace App\Models;

use App\Enums\InvestorStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_field',
        'title',
        'summary',
        'user_id',
        'created_at',
        'status',
        'approved_at',
        'approved_by',
        'admin_note',
    ];

    protected $casts = [
        'status' => InvestorStatus::class,
        'approved_at' => 'datetime',
    ];

    //! Relations

    // approver admin user
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // investor owner
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function countries()
    {
        return $this->morphMany(Countryable::class, 'countryable');
    }

    public function resources()
    {
        return $this->hasOne(InvestorResource::class);
    }

    public function contributions()
    {
        return $this->hasOne(InvestorContribution::class);
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function isPending(): bool
    {
        return $this->status === InvestorStatus::PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === InvestorStatus::APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === InvestorStatus::REJECTED;
    }
}
