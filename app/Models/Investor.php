<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = ['investor_field' , 'summary'];

    // Relations
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
}
