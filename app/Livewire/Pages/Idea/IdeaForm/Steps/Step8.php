<?php

namespace App\Livewire\Pages\Idea\IdeaForm\Steps;

use App\Models\Idea;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

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
        'return_type' => null,
    ];

    public string|null $activeColumn = null;

    public function mount(): void
    {
        $ideaId = session('current_idea_id');
        if (!$ideaId) return;

        $idea = Idea::find($ideaId);
        if (!$idea || !$idea->returns) return;

        $this->data = array_merge($this->data, $idea->returns->only(array_keys($this->data)));
    }


    #[On('validate-step-8')]
    public function validateStep8()
    {
        // --- تنظيف: حول أي string فاضية إلى null ---
        foreach (
            [
                'profit_only_percentage',
                'one_time_dollar',
                'one_time_sar',
                'combo_dollar',
                'combo_sar',
                'combo_percentage'
            ] as $key
        ) {
            if (array_key_exists($key, $this->data) && $this->data[$key] === '') {
                $this->data[$key] = null;
            }
        }

        // أولًا تحقق القواعد الأساسية (rules الموجودة)
        $this->validate();

        // --- شرط: لازم المستخدم يختار واحدة من التلات طرق على الأقل ---
        $hasProfitOnly = !is_null($this->data['profit_only_percentage']);
        $hasOneTime = !is_null($this->data['one_time_dollar']) || !is_null($this->data['one_time_sar']);
        $hasCombo = !is_null($this->data['combo_dollar']) || !is_null($this->data['combo_sar']) || !is_null($this->data['combo_percentage']);

        if (! $hasProfitOnly && ! $hasOneTime && ! $hasCombo) {
            $this->addError('data', __('idea.steps.step8.choose_one'));
            return;
        }

        // --- تحقق One-time: لازم عملة واحدة فقط لو دخل أي حاجة هنا ---
        $oneTimeCount = (!is_null($this->data['one_time_dollar']) ? 1 : 0) + (!is_null($this->data['one_time_sar']) ? 1 : 0);
        if ($oneTimeCount > 1) {
            // دخل الدولار والريال معًا — مش مسموح
            $this->addError('one_time', __('idea.steps.step8.only_one_currency'));
            return;
        }
        // ملاحظة: لو $oneTimeCount === 0 يبقى الـ choose_one فوق ممكن يكون غطى الحالة (يعتمد على أي اختيار آخر)

        // --- تحقق Combo: لازم عملة واحدة فقط AND نسبة موجودة ---
        $comboCurrencyCount = (!is_null($this->data['combo_dollar']) ? 1 : 0) + (!is_null($this->data['combo_sar']) ? 1 : 0);
        $comboHasPercentage = !is_null($this->data['combo_percentage']);

        if ($comboCurrencyCount > 1) {
            $this->addError('combo', __('idea.steps.step8.only_one_currency'));
            return;
        }

        if ($comboCurrencyCount === 1 && ! $comboHasPercentage) {
            // دخل عملة بس من غير نسبة
            $this->addError('combo', __('idea.steps.step8.combo_percentage_required'));
            return;
        }

        if ($comboCurrencyCount === 0 && $comboHasPercentage) {
            // دخل نسبة بس بدون عملة
            $this->addError('combo', __('idea.steps.step8.combo_currency_required'));
            return;
        }

        // كل حاجة تمام — احفظ
        $this->syncData();
        $this->dispatch('go-to-next-step');
    }



    public function render()
    {
        return view('livewire.pages.idea.idea-form.steps.step8');
    }

    public function messages(): array
    {
        return [
            'data.profit_only_percentage.in' => __('idea.validation.step8.profit_only_percentage'),
            'data.one_time_dollar.numeric' => __('idea.validation.step8.one_time_dollar_numeric'),
            'data.one_time_dollar.min' => __('idea.validation.step8.one_time_dollar_min'),
            'data.one_time_sar.numeric' => __('idea.validation.step8.one_time_sar_numeric'),
            'data.one_time_sar.min' => __('idea.validation.step8.one_time_sar_min'),
            'data.combo_dollar.numeric' => __('idea.validation.step8.combo_dollar_numeric'),
            'data.combo_dollar.min' => __('idea.validation.step8.combo_dollar_min'),
            'data.combo_sar.numeric' => __('idea.validation.step8.combo_sar_numeric'),
            'data.combo_sar.min' => __('idea.validation.step8.combo_sar_min'),
            'data.combo_percentage.in' => __('idea.validation.step8.combo_percentage'),
        ];
    }

    private function syncData(): void
    {
        $ideaId = session('current_idea_id');
        if (!$ideaId) return;

        $idea = Idea::find($ideaId);
        if (!$idea) return;

        // تحديد return_type بناءً على القيم المختارة
        $type = $this->data['return_type'] ?? null;

        $idea->returns()->updateOrCreate(
            ['idea_id' => $ideaId],
            array_merge($this->data, ['return_type' => $type])
        );
    }
}
