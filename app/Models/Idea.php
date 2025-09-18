<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['idea_field'];

    // Relations
    public function countries()
    {
        return $this->hasMany(IdeaCountry::class);
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

    public function summary()
    {
        return $this->hasOne(IdeaSummary::class);
    }

    public function attachments()
    {
        return $this->hasMany(IdeaAttachment::class);
    }
}
