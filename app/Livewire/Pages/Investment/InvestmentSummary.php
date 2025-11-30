<?php

namespace App\Livewire\Pages\Investment;

use Livewire\Component;
use App\Models\Investor;
use App\Models\Idea;

class InvestmentSummary extends Component
{
    public $investor;
    public $matchingIdeas;
    public $amount = 4;

    public function mount($investment)
    {
        // جلب بيانات المستثمر مع الموارد والدول
        $this->investor = Investor::with(['resources', 'countries', 'contributions'])->findOrFail($investment);

        // جلب جميع الأفكار مع العلاقات اللازمة
        $ideas = Idea::with(['resources', 'costs.range', 'countries'])->get();

        // فلترة الأفكار حسب الأولويات
        $this->matchingIdeas = $ideas->filter(function ($idea) {
            // 1️⃣ المجال
            if ($idea->idea_field !== $this->investor->investor_field) {
                return false;
            }

            // 2️⃣ الدول
            $ideaCountries = $idea->countries->pluck('country')->toArray();
            $investorCountries = $this->investor->countries->pluck('country')->toArray();
            if (count(array_intersect($ideaCountries, $investorCountries)) === 0) {
                return false;
            }

            // // 3️⃣ رأس المال: أقرب قيمة بين cost ranges
            // $investorBudget = $this->investor->contributions->money_amount ?? 0;

            // $ideaCapital = $idea->costs->pluck('range.value')
            //     ->sortBy(fn($v) => abs($v - $investorBudget)) // ترتيب حسب الأقرب للمستثمر
            //     ->first() ?? 0;

            // $capitalMatch = abs($investorBudget - $ideaCapital) <= 200000; // فرق مقبول 200k
            // if (!$capitalMatch) {
            //     return false;
            // }

            // // 4️⃣ الموارد (اختياري: تحقق من الموارد المطلوبة)
            // if ($idea->resources && $this->investor->resources) {
            //     if ($idea->resources->company == 'yes' && $this->investor->resources->company != 'yes') {
            //         return false;
            //     }
            //     // يمكن إضافة باقي الموارد بنفس الطريقة إذا أحببت
            // }

            return true; // لو كل الشروط صح
        });
    }


    public function loadMore()
    {
        $this->amount += 4;
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-summary');
    }
}
