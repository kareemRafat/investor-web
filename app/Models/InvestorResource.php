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
        'number_staff',
        'workers',
        'number_workers',
        'spaces',
        'space_type_exec',
        'equipment',
        'equipment_type',
        'software',
        'software_type',
        'website'
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
