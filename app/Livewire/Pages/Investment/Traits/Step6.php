<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Models\Investor;
use App\Traits\HandlesAttachmentUpload;
use Livewire\WithFileUploads;

trait Step6
{
    use HandlesAttachmentUpload, WithFileUploads;

    public function initStep6()
    {
        $user = auth()->user();
        if (! $user->hasCompleteProfile()) {
            $this->state['step6']['showProfileFields'] = true;
            $this->state['step6']['job_title'] = $user->job_title;
            $this->state['step6']['phone'] = $user->phone;
            $this->state['step6']['residence_country'] = $user->residence_country;
            $this->state['step6']['birth_date'] = $user->birth_date;
        }

        $investorId = session('current_investor_id');
        if ($investorId) {
            $investor = Investor::with('attachments')->find($investorId);
            if ($investor) {
                $this->state['step6']['data']['summary'] = $investor->summary;
                $this->state['step6']['data']['investor_title'] = $investor->title;
                $this->state['step6']['currentAttachment'] = $investor->attachments()->first()?->original_name ?? 'Uploaded File';
                $this->state['step6']['data']['contact_visibility'] = $investor->contact_visibility?->value ?? 'closed';
            }
        }
    }

    public function validateStep6()
    {
        $user = auth()->user();

        // Block Free users from choosing Open
        if ($this->state['step6']['data']['contact_visibility'] === 'open' && $user->plan_type === \App\Enums\PlanType::FREE) {
            $this->addError('state.step6.data.contact_visibility', __('idea.steps.step9.upgrade_required_for_open'));

            return;
        }

        $rules = [
            'state.step6.data.investor_title' => 'required|string|max:200',
            'state.step6.data.summary' => 'required|string|max:2000',
            'state.step6.data.attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'state.step6.data.contact_visibility' => 'required|in:open,closed',
        ];

        if ($this->state['step6']['showProfileFields']) {
            $rules['state.step6.job_title'] = 'required|string|max:255';
            $rules['state.step6.phone'] = 'required|string|max:255';
            $rules['state.step6.residence_country'] = 'required|string|max:255';
            $rules['state.step6.birth_date'] = 'required|date|before:today';
        }

        $this->validate($rules, [
            'state.step6.data.investor_title.required' => __('investor.validation.step6.investor_title_required'),
            'state.step6.data.investor_title.string' => __('investor.validation.step6.investor_title_string'),
            'state.step6.data.investor_title.max' => __('investor.validation.step6.investor_title_max'),

            'state.step6.data.summary.required' => __('investor.validation.step6.summary_required'),
            'state.step6.data.summary.string' => __('investor.validation.step6.summary_string'),
            'state.step6.data.summary.max' => __('investor.validation.step6.summary_max'),

            'state.step6.data.attachment.file' => __('investor.validation.step6.attachments_file'),
            'state.step6.data.attachment.mimes' => __('investor.validation.step6.attachments_mimes'),
            'state.step6.data.attachment.max' => __('investor.validation.step6.attachments_max'),
        ]);

        // Check credits if changing from closed to open
        $investorId = session('current_investor_id');
        if ($investorId) {
            $investor = Investor::find($investorId);
            if ($investor && $investor->contact_visibility?->value === 'closed' && $this->state['step6']['data']['contact_visibility'] === 'open') {
                if ($user->contact_credits < 1) {
                    $this->addError('state.step6.data.contact_visibility', __('pages.unlock_contact.error_no_credits'));

                    return;
                }
            }
        }
    }
}
