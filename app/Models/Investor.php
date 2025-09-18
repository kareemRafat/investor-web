<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = ['investor_field' , 'visibility'];

    public function countries()
    {
        return $this->hasMany(InvestorCountry::class);
    }

    public function resources()
    {
        return $this->hasOne(InvestorResource::class);
    }

    public function contributions()
    {
        return $this->hasOne(InvestorContribution::class);
    }

    public function summary()
    {
        return $this->hasOne(InvestorSummary::class);
    }

    public function attachments()
    {
        return $this->hasMany(InvestorAttachment::class);
    }
}
