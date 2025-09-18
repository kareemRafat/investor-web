<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestorSummary extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'summary', 'attachments'];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function investor() {
        return $this->belongsTo(Investor::class);
    }
}
