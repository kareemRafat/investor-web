<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaContribution extends Model
{
    protected $fillable = [
        'idea_id',
        'contribute_type','staff','staff_person_money',
        'money_amount','money_percent',
        'person_money_amount','person_money_percent'
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}

