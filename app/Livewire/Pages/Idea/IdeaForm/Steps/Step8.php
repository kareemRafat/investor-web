<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Step8 extends Component
{
    #[Validate([
        'data.profit_only_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
        'data.one_time_dollar' => 'nullable|numeric|min:1',
        'data.one_time_sar' => 'nullable|numeric|min:1',
        'data.combo_dollar' => 'nullable|numeric|min:1',
        'data.combo_sar' => 'nullable|numeric|min:1',
        'data.combo_percentage' => 'nullable|in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75',
    ])]
    public array $data = [
        'profit_only_percentage' => null,
        'one_time_dollar' => null,
        'one_time_sar' => null,
        'combo_dollar' => null,
        'combo_sar' => null,
        'combo_percentage' => null,
    ];

    #[On('validate-step-8')]
    public function validateStep8()
    {
        $this->validate();

        // شرط: لازم المستخدم يختار واحدة من التلات طرق على الأقل
        if (
            is_null($this->data['profit_only_percentage']) &&
            is_null($this->data['one_time_dollar']) &&
            is_null($this->data['one_time_sar']) &&
            (is_null($this->data['combo_dollar']) && is_null($this->data['combo_sar']) && is_null($this->data['combo_percentage']))
        ) {
            $this->addError('data', __('idea.steps.step8.choose_one'));

            return;
        }

        // شرط: لو المستخدم اختار الـ Combo → لازم الثلاثة موجودين
        if (
            !is_null($this->data['combo_dollar']) ||
            !is_null($this->data['combo_sar']) ||
            !is_null($this->data['combo_percentage'])
        ) {
            if (
                is_null($this->data['combo_dollar']) ||
                is_null($this->data['combo_sar']) ||
                is_null($this->data['combo_percentage'])
            ) {
                $this->addError('combo', __('idea.steps.step8.combo_complete'));
                return;
            }
        }

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step8');
    }

    public function messages()
    {
        return [
            'data.profit_only_percentage.in' => __('idea.validation.step8.profit_only_percentage'),

            'data.one_time_dollar.numeric' => __('idea.validation.step8.one_time_dollar_numeric'),
            'data.one_time_dollar.min'     => __('idea.validation.step8.one_time_dollar_min'),

            'data.one_time_sar.numeric' => __('idea.validation.step8.one_time_sar_numeric'),
            'data.one_time_sar.min'     => __('idea.validation.step8.one_time_sar_min'),

            'data.combo_dollar.numeric' => __('idea.validation.step8.combo_dollar_numeric'),
            'data.combo_dollar.min'     => __('idea.validation.step8.combo_dollar_min'),

            'data.combo_sar.numeric' => __('idea.validation.step8.combo_sar_numeric'),
            'data.combo_sar.min'     => __('idea.validation.step8.combo_sar_min'),

            'data.combo_percentage.in' => __('idea.validation.step8.combo_percentage'),
        ];
    }
}
