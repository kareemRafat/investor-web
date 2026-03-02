<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostProfitRange extends Model
{
    public $timestamps = false;

    protected $fillable = ['type', 'label_en', 'label_ar', 'min_value', 'max_value'];
}
