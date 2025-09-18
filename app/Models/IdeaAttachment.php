<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaAttachment extends Model
{
    protected $fillable = ['idea_id', 'path'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}

