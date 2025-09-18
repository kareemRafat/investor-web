<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorCountry extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'country'];

    public function investor() {
        return $this->belongsTo(Investor::class);
    }
}

