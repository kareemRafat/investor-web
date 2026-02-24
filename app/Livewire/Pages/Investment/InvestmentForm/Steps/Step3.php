<?php

namespace App\Livewire\Pages\Investment\InvestmentForm\Steps;

use App\Models\InvestorResource;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Step3 extends Component
{
    #[Validate([
        'data.company' => 'required|in:yes,no',
        'data.space_type' => 'required_if:data.company,yes|nullable|in:large,small',
        'data.staff' => 'required|in:yes,no',
        'data.staff_number' => 'required_if:data.staff,yes|nullable|integer|min:1',
        'data.workers' => 'required|in:yes,no',
        'data.workers_number' => 'required_if:data.workers,yes|nullable|integer|min:1',
        'data.executive_spaces' => 'required|in:yes,no',
        'data.executive_spaces_type' => 'required_if:data.executive_spaces,yes|nullable|in:open_spaces,factory,land_space',
        'data.equipment' => 'required|in:yes,no',
        'data.equipment_type' => 'required_if:data.equipment,yes|nullable|in:industrial,electronic,other',
        'data.software' => 'required|in:yes,no',
        'data.software_type' => 'required_if:data.software,yes|nullable|in:static,dynamic',
        'data.website' => 'required|in:yes,no',
    ])]
    public array $data = [
        'company' => null,
        'space_type' => null,
        'staff' => null,
        'staff_number' => null,
        'workers' => null,
        'workers_number' => null,
        'executive_spaces' => null,
        'executive_spaces_type' => null,
        'equipment' => null,
        'equipment_type' => null,
        'software' => null,
        'software_type' => null,
        'website' => null,
    ];

    public bool $disableResources = false;

    public function mount(): void
    {
        // when return back
        $investorId = session('current_investor_id');
        if ($investorId) {
            $resource = InvestorResource::where('investor_id', $investorId)->first();
            if ($resource) {
                $this->data = array_merge($this->data, $resource->toArray());

                // detect if user previously disabled the step
                if (
                    is_null($resource->company)
                    && is_null($resource->staff)
                    && is_null($resource->workers)
                    && is_null($resource->executive_spaces)
                    && is_null($resource->equipment)
                    && is_null($resource->software)
                    && is_null($resource->website)
                ) {
                    $this->disableResources = true;
                }
            }
        }
    }

    public function updatedDisableResources($value)
    {
        // this function to use it not to empty the investor_id and uncheck all other feilds
        if ($value) {
            $requiredFields = ['investor_id']; // excepted field
            $this->data = collect($this->data)
                ->mapWithKeys(fn ($v, $k) => in_array($k, $requiredFields) ? [$k => $v] : [$k => null])
                ->toArray();
        }
    }

    #[On('validate-step-3')]
    public function validateStep3()
    {
        if (! $this->disableResources) {
            $this->validate();
        }

        $this->syncResource();

        $this->dispatch('go-to-next-step');
    }

    public function render()
    {
        return view('livewire.pages.investment.investment-form.steps.step3');
    }

    public function messages()
    {
        return [
            // step5
            'data.company.*' => __('idea.validation.step5.company'),
            'data.space_type.*' => __('idea.validation.step5.space_type'),
            'data.staff.*' => __('idea.validation.step5.staff'),
            'data.staff_number.*' => __('idea.validation.step5.staff_number'),
            'data.workers.*' => __('idea.validation.step5.workers'),
            'data.workers_number.*' => __('idea.validation.step5.workers_number'),
            'data.executive_spaces.*' => __('idea.validation.step5.executive_spaces'),
            'data.executive_spaces_type.*' => __('idea.validation.step5.executive_spaces_type'),
            'data.equipment.*' => __('idea.validation.step5.equipment'),
            'data.equipment_type.*' => __('idea.validation.step5.equipment_type'),
            'data.software.*' => __('idea.validation.step5.software'),
            'data.software_type.*' => __('idea.validation.step5.software_type'),
            'data.website.*' => __('idea.validation.step5.website'),
        ];
    }

    public function syncResource(): void
    {
        $investorId = session('current_investor_id');
        if (! $investorId) {
            $this->addError('data', 'Investor not found in session.');

            return;
        }

        InvestorResource::updateOrCreate(
            ['investor_id' => $investorId],
            $this->data
        );
    }
}
