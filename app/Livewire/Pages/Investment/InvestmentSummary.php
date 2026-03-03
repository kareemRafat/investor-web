<?php

namespace App\Livewire\Pages\Investment;

use App\Models\Idea;
use App\Models\Investor;
use Illuminate\Support\Collection;
use Livewire\Component;

class InvestmentSummary extends Component
{
    public Investor $investor;

    public Collection $matchingIdeas;

    public int $amount = 5;

    public function mount($investment)
    {
        // جلب بيانات المستثمر مع الموارد والدول والمساهمات
        $this->investor = Investor::with(['resources', 'countries', 'contributions'])->findOrFail($investment);

        // جلب جميع الأفكار مع العلاقات اللازمة
        $ideas = Idea::with(['resources', 'costs', 'countries', 'contributions'])->get();

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
            $ideaCosts = $idea->costs;
            $investorRange = $this->investor->contributions?->money_contributions;

            if (! $investorRange) {
                return false;
            }

            $matchCapital = $ideaCosts->contains(function ($cost) use ($investorRange) {
                if (! $cost->range_id) {
                    return false;
                }

                return $investorRange->min() <= $cost->range_id->max() &&
                    ($investorRange->max() === null || $investorRange->max() >= $cost->range_id->min());
            });

            if (! $matchCapital) {
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
