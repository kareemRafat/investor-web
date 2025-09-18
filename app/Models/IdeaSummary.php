<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaSummary extends Model
{
    protected $fillable = ['idea_id', 'summary'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}

