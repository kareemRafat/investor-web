<?php

namespace App\Livewire\Pages\Idea;

use App\Enums\CostProfitRange;
use App\Models\Idea;
use App\Models\Investor;
use Livewire\Attributes\Title;
use Livewire\Component;

class IdeaSummary extends Component
{
    public Idea $idea;

    public $amount = 4;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function loadMore()
    {
        $this->amount += 4;
    }

    #[Title('Ideas Summary')]
    public function render()
    {
        // جلب جميع المستثمرين مع العلاقات اللازمة
        $investors = Investor::with(['contributions', 'countries', 'resources'])
            ->get();

        // فلترة المستثمرين حسب المطابقة مع الفكرة
        $matchingInvestors = $investors->filter(function ($investor) {
            //  المجال
            if ($investor->investor_field !== $this->idea->idea_field) {
                return false;
            }

            //  الدول
            $ideaCountries = $this->idea->countries->pluck('country')->toArray();
            $investorCountries = $investor->countries->pluck('country')->toArray();
            if (count(array_intersect($ideaCountries, $investorCountries)) === 0) {
                return false;
            }

            //  رأس المال / المساهمة المالية
            $ideaCosts = $this->idea->costs;
            $investorRange = $investor->contributions?->money_contributions;

            if (! $investorRange) {
                return false;
            }

            // تحقق إذا المبلغ المعروض يقع ضمن أي نطاق تكلفة للفكرة
            $matches = $ideaCosts->contains(function ($cost) use ($investorRange) {
                if (! $cost->range_id) {
                    return false;
                }

                return $investorRange->min() <= $cost->range_id->max() &&
                    ($investorRange->max() === null || $investorRange->max() >= $cost->range_id->min());
            });

            if (! $matches) {
                return false;
            }

            return true;
        })->take($this->amount);

        $moneyRanges = collect(CostProfitRange::filterByType('money_contribution'))->keyBy('value');

        return view('livewire.pages.idea.idea-summary', [
            'investors' => $matchingInvestors,
            'moneyRanges' => $moneyRanges,
        ]);
    }
}
