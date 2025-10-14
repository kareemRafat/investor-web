<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\IdeaContribution;
use Livewire\Attributes\Validate;

class Step7 extends Component
{
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

    public function rules()
    {
        $rules = [
            'data.contribute_type' => 'required|in:sell,idea,capital,personal,both',
            'data.staff' => 'required_if:data.contribute_type,personal|nullable|in:full_time,part_time,supervision',
            'data.staff_person_money' => 'required_if:data.contribute_type,both|nullable|in:full_time,part_time,supervision',
        ];

        // للـ capital فقط
        if ($this->data['contribute_type'] === 'capital') {
            // لو دخل الاثنين مع بعض
            if (!empty($this->data['money_amount']) && !empty($this->data['money_percent'])) {
                $rules['data.money_amount'] = 'prohibited';
                $rules['data.money_percent'] = 'prohibited';
            }
            // لو مدخلش حاجة خالص
            elseif (empty($this->data['money_amount']) && empty($this->data['money_percent'])) {
                $rules['data.money_amount'] = 'required';
            }
            // لو دخل واحد بس (صح)
            else {
                $rules['data.money_amount'] = 'nullable|numeric|min:1';
                $rules['data.money_percent'] = 'nullable|numeric|min:1|max:100';
            }
        }

        // للـ both فقط
        if ($this->data['contribute_type'] === 'both') {
            // لو دخل الاثنين مع بعض
            if (!empty($this->data['person_money_amount']) && !empty($this->data['person_money_percent'])) {
                $rules['data.person_money_amount'] = 'prohibited';
                $rules['data.person_money_percent'] = 'prohibited';
            }
            // لو مدخلش حاجة خالص
            elseif (empty($this->data['person_money_amount']) && empty($this->data['person_money_percent'])) {
                $rules['data.person_money_amount'] = 'required';
            }
            // لو دخل واحد بس (صح)
            else {
                $rules['data.person_money_amount'] = 'nullable|numeric|min:1';
                $rules['data.person_money_percent'] = 'nullable|numeric|min:1|max:100';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'data.contribute_type.*' => __('idea.validation.step7.contribute_type'),
            'data.staff.*' => __('idea.validation.step7.staff'),
            'data.staff_person_money.*' => __('idea.validation.step7.staff_person_money'),

            // امسح الـ wildcard من هنا
            'data.money_amount.numeric' => __('idea.validation.step7.money_amount'),
            'data.money_amount.min' => __('idea.validation.step7.money_amount'),
            'data.money_percent.numeric' => __('idea.validation.step7.money_percent'),
            'data.money_percent.min' => __('idea.validation.step7.money_percent'),
            'data.money_percent.max' => __('idea.validation.step7.money_percent'),
            'data.person_money_amount.numeric' => __('idea.validation.step7.person_money_amount'),
            'data.person_money_amount.min' => __('idea.validation.step7.person_money_amount'),
            'data.person_money_percent.numeric' => __('idea.validation.step7.person_money_percent'),
            'data.person_money_percent.min' => __('idea.validation.step7.person_money_percent'),
            'data.person_money_percent.max' => __('idea.validation.step7.person_money_percent'),

            // الرسائل الخاصة
            'data.money_amount.required' => __('idea.validation.step7.money_required_one'),
            'data.money_amount.prohibited' => __('idea.validation.step7.money_both_prohibited'),
            'data.money_percent.prohibited' => __('idea.validation.step7.money_both_prohibited'),
            'data.person_money_amount.required' => __('idea.validation.step7.person_money_required_one'),
            'data.person_money_amount.prohibited' => __('idea.validation.step7.person_money_both_prohibited'),
            'data.person_money_percent.prohibited' => __('idea.validation.step7.person_money_both_prohibited'),
        ];
    }

    // DB Sync
    public function syncContribution()
    {
        $ideaId = session('current_idea_id');
        if ($ideaId) {
            // parse any "" to null
            $cleanData = collect($this->data)->map(function ($value) {
                return $value === '' ? null : $value;
            })->toArray();

            IdeaContribution::updateOrCreate(
                ['idea_id' => $ideaId],
                $cleanData
            );
        }
    }
}
