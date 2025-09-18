<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorResource extends Model
{
    protected $fillable = [
        'investor_id',
        'company',
        'space_type',
        'staff',
        'staff_number',
        'workers',
        'workers_number',
        'executive_spaces',
        'executive_spaces_type',
        'equipment',
        'equipment_type',
        'software',
        'software_type',
        'website',
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
