<?php

namespace App\Livewire\Pages\Investment\Traits;

use App\Livewire\Forms\Investment\Step6Form;
use App\Models\Investor;
use App\Traits\HandlesAttachmentUpload;

trait Step6
{
    use HandlesAttachmentUpload;

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

        $this->validate(
            Step6Form::rules((bool) $this->state['step6']['showProfileFields']),
            Step6Form::messages()
        );

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
