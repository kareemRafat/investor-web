<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    protected $fillable = ['path', 'attachable_id', 'attachable_type', 'original_name'];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getSizeKbAttribute(): string
    {
        if (Storage::disk('public')->exists($this->path)) {
            return number_format(Storage::disk('public')->size($this->path) / 1024, 0).' KB';
        }

        return '-';
    }
}
