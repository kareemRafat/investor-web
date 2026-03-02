<?php

namespace App\Livewire\Pages\Idea\Traits;

use App\Models\Idea;
use App\Traits\HandlesAttachmentUpload;
use Livewire\WithFileUploads;

trait Step9
{
    use HandlesAttachmentUpload, WithFileUploads;

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

        $rules = [
            'state.step9.data.idea_title' => 'required|string|max:255',
            'state.step9.data.summary' => 'required|string|max:2000',
            'state.step9.data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'state.step9.data.contact_visibility' => 'required|in:open,closed',
        ];

        if ($this->state['step9']['showProfileFields']) {
            $rules['state.step9.job_title'] = 'required|string|max:255';
            $rules['state.step9.phone'] = 'required|string|max:255';
            $rules['state.step9.residence_country'] = 'required|string|max:255';
            $rules['state.step9.birth_date'] = 'required|date|before:today';
        }

        $this->validate($rules, [
            'state.step9.data.idea_title.required' => __('idea.validation.step9.idea_title_required'),
            'state.step9.data.idea_title.string' => __('idea.validation.step9.idea_title_string'),
            'state.step9.data.idea_title.max' => __('idea.validation.step9.idea_title_max'),
            'state.step9.data.summary.required' => __('idea.validation.step9.summary_required'),
            'state.step9.data.summary.string' => __('idea.validation.step9.summary_string'),
            'state.step9.data.summary.max' => __('idea.validation.step9.summary_max'),
            'state.step9.data.attachment.file' => __('idea.validation.step9.attachments_file'),
            'state.step9.data.attachment.mimes' => __('idea.validation.step9.attachments_mimes'),
            'state.step9.data.attachment.max' => __('idea.validation.step9.attachments_max'),
        ]);

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
