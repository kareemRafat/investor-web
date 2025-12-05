<?php

namespace App\Livewire\Pages\Idea;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Investor;
use Livewire\Attributes\Title;
use App\Models\CostProfitRange;

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
        $investors = Investor::with(['contributions.contributionRange', 'countries', 'resources'])
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
            $ideaCosts = $this->idea->costs->load('range'); // جلب range
            $investorRange = $investor->contributions?->contributionRange;

            if (!$investorRange) {
                return false;
            }

            // تحقق إذا المبلغ المعروض يقع ضمن أي نطاق تكلفة للفكرة
            $matches = $ideaCosts->contains(function ($cost) use ($investorRange) {
                return $investorRange->min_value <= $cost->range->max_value &&
                    $investorRange->max_value >= $cost->range->min_value;
            });

            if (!$matches) {
                return false;
            }


            return true;
        })->take($this->amount);

        $moneyRanges = CostProfitRange::where('type', 'money_contribution')->get()->keyBy('id');

        return view('livewire.pages.idea.idea-summary', [
            'investors' => $matchingInvestors,
            'moneyRanges' => $moneyRanges,
        ]);
    }
}
