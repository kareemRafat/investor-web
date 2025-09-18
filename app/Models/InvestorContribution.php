<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestorContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_id',
        'contribute_type',
        'staff',
        'staff_person_money',
        'money_amount',
        'money_percent',
        'person_money_amount',
        'person_money_percent'
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
