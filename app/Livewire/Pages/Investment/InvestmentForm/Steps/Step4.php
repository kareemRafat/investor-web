<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use App\Models\InvestorContribution;

class Step4 extends Component
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
        $investorId = session('current_investor_id');
        if ($investorId) {
            $contribution = InvestorContribution::where('investor_id', $investorId)->first();
            if ($contribution) {
                $this->data = array_merge($this->data, $contribution->toArray());
            }
        }
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


    #[On('validate-step-4')]
    public function validateStep4()
    {
        $this->validate();

        $this->syncContribution();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step4');
    }

    public function syncContribution(): void
    {
        $investorId = session('current_investor_id');
        if ($investorId) {
            // parse any "" to null
            $cleanData = collect($this->data)->map(function ($value) {
                return $value === '' ? null : $value;
            })->toArray();
        }

        InvestorContribution::updateOrCreate(
            ['investor_id' => $investorId],
            $cleanData
        );
    }
}
