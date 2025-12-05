<?php

namespace App\Livewire\Pages\Investment;

use App\Models\Investor;
use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Collection;

class InvestmentSummary extends Component
{
    public Investor $investor;
    public Collection $matchingIdeas;
    public int $amount = 5;

    public function mount($investment)
    {
        // جلب بيانات المستثمر مع الموارد والدول والمساهمات
        $this->investor = Investor::with(['resources', 'countries', 'contributions.contributionRange'])->findOrFail($investment);

        // جلب جميع الأفكار مع العلاقات اللازمة
        $ideas = Idea::with(['resources', 'costs.range', 'countries', 'contributions'])->get();

        // فلترة الأفكار حسب الأولويات
        $this->matchingIdeas = $ideas->filter(function ($idea) {
            //  المجال
            if ($idea->idea_field !== $this->investor->investor_field) {
                return false;
            }

            //  الدول
            $ideaCountries = $idea->countries->pluck('country')->toArray();
            $investorCountries = $this->investor->countries->pluck('country')->toArray();
            if (count(array_intersect($ideaCountries, $investorCountries)) === 0) {
                return false;
            }

            //  رأس المال (فلترة حسب الـ cost.range)
            $ideaCosts = $idea->costs->pluck('range')->filter();
            $matchCapital = $ideaCosts->contains(function ($range) {
                $investorContribution = $this->investor->contributions?->contributionRange;
                if (!$investorContribution) return false;

                return $range->min_value <= $investorContribution->max_value &&
                    $range->max_value >= $investorContribution->min_value;
            });

            if (!$matchCapital) {
                return false;
            }

            return true; // كل الشروط صح
        });
    }

    public function loadMore()
    {
        $this->amount += 5;
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-summary', [
            'matchingIdeas' => $this->matchingIdeas->take($this->amount),
        ]);
    }
}
