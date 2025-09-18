<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\IdeaContribution;
use Livewire\Attributes\Validate;

class Step7 extends Component
{
    #[Validate([
        'data.contribute_type' => 'required|in:sell,idea,capital,personal,both',
        'data.staff' => 'required_if:data.contribute_type,capital|nullable|in:full_time,part_time,supervision',
        'data.money_amount' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1',
        'data.money_percent' => 'required_if:data.contribute_type,personal|nullable|numeric|min:1|max:100',
        'data.person_money_amount' => 'required_if:data.contribute_type,both|nullable|numeric|min:1',
        'data.person_money_percent' => 'required_if:data.contribute_type,both|nullable|numeric|min:1|max:100',
        'data.staff_person_money' => 'required_if:data.contribute_type,both|nullable|in:full_time,part_time,supervision',
    ])]
    public array $data = [
        'contribute_type' => null,
        'staff' => null,
        'staff_person_money' => null,
        'money_amount' => null,
        'money_percent' => null,
        'person_money_amount' => null,
        'person_money_percent' => null,
    ];

    public function mount(): void
    {
        // data found if the user return back
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            $idea = Idea::find($ideaId);
            if ($idea) {
                $contribution = $idea->contributions()->first(); // relation contributions()
                if ($contribution) {
                    $this->data = $contribution->only(array_keys($this->data));
                }
            }
        }
    }

    #[On('validate-step-7')]
    public function validateStep7()
    {
        $this->validate();

        $this->syncContribution();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step7');
    }

    public function messages()
    {
        return [
            // step7
            'data.contribute_type.*'     => __('idea.validation.step7.contribute_type'),
            'data.staff.*'               => __('idea.validation.step7.staff'),
            'data.staff_person_money.*'  => __('idea.validation.step7.staff_person_money'),
            'data.money_amount.*'        => __('idea.validation.step7.money_amount'),
            'data.money_percent.*'       => __('idea.validation.step7.money_percent'),
            'data.person_money_amount.*' => __('idea.validation.step7.person_money_amount'),
            'data.person_money_percent.*' => __('idea.validation.step7.person_money_percent'),
        ];
    }

    // DB Sync
    public function syncContribution()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            IdeaContribution::updateOrCreate(
                ['idea_id' => $ideaId],
                $this->data
            );
        }
    }
}
