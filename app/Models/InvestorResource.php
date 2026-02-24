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

    public function getTranslatedRequirementsAttribute(): array
    {
        $resources = [];

        if ($this->company === 'yes') {
            $resources[] = __('investor.steps.step3.company');
        }

        if ($this->staff === 'yes') {
            $resources[] = __('investor.steps.step3.staff').($this->staff_number ? ' ( '.$this->staff_number.' )' : '');
        }

        if ($this->workers === 'yes') {
            $resources[] = __('investor.steps.step3.workers').($this->workers_number ? ' ( '.$this->workers_number.' )' : '');
        }

        if ($this->executive_spaces === 'yes') {
            $resources[] = __('investor.steps.step3.executive_spaces')
                .($this->executive_spaces_type ? ' ( '.__('investor.common.'.$this->executive_spaces_type).' )' : '');
        }

        if ($this->equipment === 'yes') {
            $resources[] = __('investor.steps.step3.equipment')
                .($this->equipment_type ? ' ( '.__('investor.common.'.$this->equipment_type).' )' : '');
        }

        if ($this->software === 'yes') {
            $resources[] = __('investor.steps.step3.software')
                .($this->software_type ? ' ( '.__('investor.common.'.$this->software_type).' )' : '');
        }

        if ($this->website === 'yes') {
            $resources[] = __('investor.steps.step3.website');
        }

        return $resources;
    }
}
