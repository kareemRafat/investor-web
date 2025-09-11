<div x-data="{
    company: @entangle('data.company').defer,
    assets: @entangle('data.assets').defer,
    salaries: @entangle('data.salaries').defer,
    operating: @entangle('data.operating').defer,
    other: @entangle('data.other').defer,
    get total() {
        return Number(this.company || 0) +
            Number(this.assets || 0) +
            Number(this.salaries || 0) +
            Number(this.operating || 0) +
            Number(this.other || 0);
    }
}">
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="Distribution of the capital required to implement the idea" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="row g-3">

                    <!-- Field Component -->
                    @php
                        $fields = [
                            'company' => 'Establishing a company',
                            'assets' => 'Fixed Assets',
                            'salaries' => 'Monthly Salaries',
                            'operating' => 'Operating Expenses',
                            'other' => 'Other',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="col-xl-7 col-lg-9 col-12 mx-auto">
                            <div class="my-1 d-flex align-items-center justify-content-center gap-3 gap-md-4 gap-lg-5">
                                <div class="w-100 text-primary border-primary text-center border py-3 rounded-8 fw-bold">
                                    {{ $label }}
                                </div>
                                <div class="w-100 d-flex align-items-center gap-2 gap-md-3 gap-lg-4">
                                    <input type="number" min="0" max="100"
                                        x-model.number="{{ $key }}" wire:model.defer="data.{{ $key }}"
                                        class="form-control py-3 rounded-8" placeholder="Enter amount" />
                                    <div class="text-light">
                                        <span class="bg-custom bg_icon rounded-circle">
                                            <i class="bi bi-percent"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @error("data.$key")
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <!-- Total -->
                    <div class="col-xl-7 col-lg-9 col-12 mx-auto mt-4">
                        <div class="text-center fw-bold fs-5" :class="total === 100 ? 'text-success' : 'text-danger'">
                            Total: <span x-text="total"></span>%
                        </div>
                        <div class="text-center small">
                            @error('total')
                                <span class="text-danger">{{ $message }}</span>
                            @else
                                <template x-if="total === 100">
                                    <span class="text-success">✅ Perfect! The distribution is balanced.</span>
                                </template>
                                <template x-if="total !== 100">
                                    <span class="text-danger">⚠️ The total must equal 100%.</span>
                                </template>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
