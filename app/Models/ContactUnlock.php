<?php

namespace App\Models;

use App\Enums\UnlockMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ContactUnlock extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'unlockable_id',
        'unlockable_type',
        'method',
    ];

    protected $casts = [
        'method' => UnlockMethod::class,
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function unlockable(): MorphTo
    {
        return $this->morphTo();
    }
}
