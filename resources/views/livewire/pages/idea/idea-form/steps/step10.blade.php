<div>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step10.title') }}" />

    <div class="step_height bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
        <div class="row g-3">

            <!-- Project + Capital + Expected Profits + Best Countries -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- The project -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.project') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <h6 class="text-white mb-0">
                                        {{ __('idea.steps.step1.options.' . ($idea->idea_field ?? '-')) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The required capital -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.capital') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <h6 class="text-white mb-0">
                                        <ul class="text-white mb-0 list-unstyled">
                                            @forelse($idea->costs as $cost)
                                                <li>
                                                    {!! app()->getLocale() === 'ar' ? $cost->range->label_ar : $cost->range->label_en !!}
                                                </li>
                                            @empty
                                                <li>-</li>
                                            @endforelse
                                        </ul>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The expected profit -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.expected_profit') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <ul class="text-white mb-0 list-unstyled">
                                        @forelse($idea->profits as $profit)
                                            <li>
                                                {!! app()->getLocale() === 'ar' ? $profit->range->label_ar : $profit->range->label_en !!}
                                            </li>
                                        @empty
                                            <li>-</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The best countries -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.best_countries') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <div class="text-white">
                                        @forelse($idea->countries as $index => $country)
                                            {{ $country->country_name }}@if (!$loop->last)
                                                -
                                            @endif
                                        @empty
                                            -
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact way + Requirements -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- Contact way -->
                    <div class="col-lg-4 col-md-6 col-12 h-100">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.contact_way') }}
                                    </h6>
                                </div>
                                <ol class="mb-0 d-flex flex-wrap gap-4 p-3 justify-content-center">
                                    <li>
                                        @if (app()->getLocale() === 'ar')
                                            الهاتف النقال
                                        @else
                                            Mobile Phone
                                        @endif
                                    </li>
                                    <li>
                                        @if (app()->getLocale() === 'ar')
                                            البريد الإلكتروني
                                        @else
                                            Email
                                        @endif
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Resources or Requirements -->
                    <div class="col-lg-8 col-md-6 col-12 h-100">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.resources') }}
                                    </h6>
                                </div>
                                <div class="rounded-8 px-3 py-4 h-100">
                                    <ol class="mb-0 d-flex flex-wrap gap-3 list-unstyled justify-content-center">
                                        @forelse(array_slice($idea->resources->translated_requirements ?? [], 0, 6) as $index => $resource)
                                            <li class="d-flex align-items-center gap-2">
                                                <span class="fw-bold">{{ $index + 1 }}.</span>
                                                <span class="small">{{ $resource }}</span>
                                            </li>
                                        @empty
                                            <li class="text-center text-muted">-</li>
                                        @endforelse
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contribution + Your requirements + Distribution -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- Contribution -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.contribution') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <ul class="mb-0 list-unstyled">
                                        @forelse($idea->contributions as $contribution)
                                            <li>{{ __('idea.steps.step7.' . ($contribution->contribute_type ?? '-')) }}
                                            </li>
                                        @empty
                                            <li>-</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Your returns -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.returns') }}
                                    </h6>
                                </div>
                                <div class="rounded-8 p-2 py-3 h-100 d-flex align-items-center justify-content-center">
                                    <ul class="mb-0 list-unstyled">
                                        @foreach (optional($idea->returns)->formatted_returns ?? ['-'] as $return)
                                            <li>{{ $return }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Capital distribution -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.capital_distribution') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    <div>
                                        @if (optional($idea->expenses)->capital_distribution)
                                            @foreach (optional($idea->expenses)->capital_distribution as $index => $expense)
                                                <span>{{ $expense }}</span>
                                                @if (!$loop->last)
                                                    <span class="mx-1">+</span>
                                                @endif
                                            @endforeach
                                        @else
                                            <span>-</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attachments + Summary -->
            <div class="col-12">
                <div class="row g-3">
                    <!-- Attachments -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column h-100">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.attachments') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex flex-column gap-2 justify-content-center">
                                    @forelse($idea->attachments as $file)
                                        <div class="d-flex gap-4 align-items-center">
                                            <img src="{{ asset('images/Container.png') }}" alt="File"
                                                width="30" height="32" />
                                            <div class="text-start">
                                                {{-- اسم الملف --}}
                                                <div class="fw-bold small">
                                                    {{ $file->original_name ?? basename($file->path) }}
                                                </div>

                                                {{-- الحجم + تاريخ الرفع --}}
                                                <small class="text-white small" dir="ltr">
                                                    {{-- الحجم بالـ KB لو عندك عمود size أو تقدر تحسبه بـ Storage::size --}}
                                                    {{ $file->size_kb }} • {{ $file->created_at->format('d M, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Summary -->
                    <div class="col-lg-9 col-md-6 col-12">
                        <div class="card bg-custom border-custom h-100 rounded-8">
                            <div class="card-body pt-0 px-0 d-flex flex-column h-100">
                                <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                    <h6 class="mb-0 fw-bold">
                                        {{ __('idea.steps.step10.summary') }}
                                    </h6>
                                </div>
                                <div
                                    class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                    {{ optional($idea->summary)->summary ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
