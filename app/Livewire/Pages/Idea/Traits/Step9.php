<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Livewire\Forms\Idea\Step9Form;
use App\Models\Idea;
use App\Traits\HandlesAttachmentUpload;

trait Step9
{
    use HandlesAttachmentUpload;

    public function initStep9()
    {
        $user = auth()->user();
        if (! $user->hasCompleteProfile()) {
            $this->state['step9']['showProfileFields'] = true;
            $this->state['step9']['job_title'] = $user->job_title;
            $this->state['step9']['phone'] = $user->phone;
            $this->state['step9']['residence_country'] = $user->residence_country;
            $this->state['step9']['birth_date'] = $user->birth_date;
        }

        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::with('attachments')->find($ideaId);
            if ($idea) {
                $this->state['step9']['data']['summary'] = $idea->summary;
                $this->state['step9']['data']['idea_title'] = $idea->title;
                $this->state['step9']['currentAttachment'] = $idea->attachments()->first()?->original_name ?? 'Uploaded File';
                $this->state['step9']['data']['contact_visibility'] = $idea->contact_visibility?->value ?? 'closed';
            }
        }
    }

    public function validateStep9()
    {
        $user = auth()->user();

        if ($this->state['step9']['data']['contact_visibility'] === 'open' && $user->plan_type === \App\Enums\PlanType::FREE) {
            $this->addError('state.step9.data.contact_visibility', __('idea.steps.step9.upgrade_required_for_open'));

            return;
        }

        $this->validate(
            Step9Form::rules((bool) $this->state['step9']['showProfileFields']),
            Step9Form::messages()
        );

        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea && $idea->contact_visibility?->value === 'closed' && $this->state['step9']['data']['contact_visibility'] === 'open') {
                if ($user->contact_credits < 1) {
                    $this->addError('state.step9.data.contact_visibility', __('pages.unlock_contact.error_no_credits'));

                    return;
                }
            }
        }
    }
}
