<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaResource extends Model
{
    protected $fillable = [
        'idea_id',
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

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function getTranslatedRequirementsAttribute(): array
    {
        $resources = [];

        if ($this->company === 'yes') {
            $resources[] = __('idea.steps.step5.company');
        }

        if ($this->staff === 'yes') {
            $resources[] = __('idea.steps.step5.staff').($this->staff_number ? ' ( '.$this->staff_number.' )' : '');
        }

        if ($this->workers === 'yes') {
            $resources[] = __('idea.steps.step5.workers').($this->workers_number ? ' ( '.$this->workers_number.' )' : '');
        }

        if ($this->executive_spaces === 'yes') {
            $resources[] = __('idea.steps.step5.executive_spaces')
                .($this->executive_spaces_type ? ' ( '.__('idea.common.'.$this->executive_spaces_type).' )' : '');
        }

        if ($this->equipment === 'yes') {
            $resources[] = __('idea.steps.step5.equipment')
                .($this->equipment_type ? ' ( '.__('idea.common.'.$this->equipment_type).' )' : '');
        }

        if ($this->software === 'yes') {
            $resources[] = __('idea.steps.step5.software')
                .($this->software_type ? ' ( '.__('idea.common.'.$this->software_type).' )' : '');
        }

        if ($this->website === 'yes') {
            $resources[] = __('idea.steps.step5.website');
        }

        return $resources;
    }
}
