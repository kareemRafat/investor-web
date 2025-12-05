<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div
                class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex justify-content-center gap-0 gap-md-3 gap-lg-4 flex-wrap">
                <h5 class="mb-0 p-3 fw-semibold text-center">
                    {{ __('investor.summary.title') }}
                </h5>
            </div>
            <div class=" bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                <div class="row g-3">

                    <!-- Project + Capital + Expected Profit + Best Countries -->
                    <div class="col-12">
                        <div class="row g-3">

                            <!-- Project -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card bg-custom border-custom h-100 rounded-8">
                                    <div class="card-body pt-0 px-0 d-flex flex-column">
                                        <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                            <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.project') }}</h6>
                                        </div>
                                        <div
                                            class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                            <h6 class="text-white mb-0 fw-bold">
                                                {{ __('investor.steps.step1.options.' . ($investor->investor_field ?? '-')) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- رأس المال -->

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card bg-custom border-custom h-100 rounded-8">
                                    <div class="card-body pt-0 px-0 d-flex flex-column">
                                        <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                            <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.contribution') }}</h6>
                                        </div>
                                        <div
                                            class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                            <div class="text-white">
                                                {!! $investor->contributions->money_contribution_label ?? '-' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Best Countries -->
                            <div class="col-md-6 col-12">
                                <div class="card bg-custom border-custom h-100 rounded-8">
                                    <div class="card-body pt-0 px-0 d-flex flex-column">
                                        <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                            <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.best_countries') }}
                                            </h6>
                                        </div>
                                        <div
                                            class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                            <div class="text-white">
                                                @forelse($investor->countries as $index => $country)
                                                    @php
                                                        $countryOption = collect(
                                                            __('investor.steps.step2.options'),
                                                        )->firstWhere('code', $country->country);
                                                        $countryName = $countryOption['name'] ?? $country->country;
                                                    @endphp
                                                    {{ $countryName }}@if (!$loop->last)
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

                        <!-- Contact + Requirements -->
                        <div class="col-12">
                            <div class="row g-3">

                                <!-- Contact -->
                                <div class="col-lg-4 col-md-6 col-12 h-100">
                                    <div class="card bg-custom border-custom h-100 rounded-8">
                                        <div class="card-body pt-0 px-0 d-flex flex-column">
                                            <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                                <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.preferred_contact') }}
                                                </h6>
                                            </div>
                                            <div
                                                class="p-2 py-2 text-center h-100 d-flex align-items-center justify-content-center">
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
                                </div>

                                <!-- Requirements -->
                                <div class="col-lg-8 col-md-6 col-12 h-100">
                                    <div class="card bg-custom border-custom h-100 rounded-8">
                                        <div class="card-body pt-0 px-0 d-flex flex-column">
                                            <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                                <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.requirements') }}</h6>
                                            </div>
                                            <div
                                                class="rounded-8 px-3 py-4 h-100 d-flex flex-wrap gap-3 justify-content-center">
                                                @forelse(array_slice($investor->resources->translated_requirements ?? [], 0, 6) as $index => $resource)
                                                    <span class="d-flex align-items-center gap-2">
                                                        <span class="fw-bold">{{ $index + 1 }}.</span>
                                                        <span class="small">{{ $resource }}</span>
                                                    </span>
                                                @empty
                                                    <span>-</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Contribution + Returns + Capital Distribution -->
                        <div class="col-12">
                            <div class="row g-3">

                                <!-- Contribution -->
                                <div class="col-md-12 col-12">
                                    <div class="card bg-custom border-custom h-100 rounded-8">
                                        <div class="card-body pt-0 px-0 d-flex flex-column">
                                            <div class="text-primary p-2 py-3 text-center bg-white rounded-top">
                                                <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.contribution') }}</h6>
                                            </div>
                                            <div
                                                class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                                <div>
                                                    @if (isset($investor->contributions->contribute_type))
                                                        {{ __('investor.steps.step4.' . $investor->contributions->contribute_type) }}
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
                                                <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.attachments') }}</h6>
                                            </div>
                                            <div
                                                class="rounded-8 p-2 py-3 text-center h-100 d-flex flex-column gap-2 justify-content-center">
                                                @forelse($investor->attachments as $file)
                                                    <div class="d-flex gap-4 align-items-center">
                                                        <img class="mx-2" src="{{ asset('images/Container.png') }}"
                                                            alt="File" width="30" height="32" />
                                                        <div class="text-start">
                                                            <div class="fw-bold small">
                                                                {{ $file->original_name ?? basename($file->path) }}</div>
                                                            <small class="text-white small" dir="ltr">
                                                                {{ $file->size_kb }} •
                                                                {{ $file->created_at->format('d M, Y') }}
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
                                                <h6 class="mb-0 fw-bold">{{ __('investor.steps.step7.summary') }}</h6>
                                            </div>
                                            <div
                                                class="rounded-8 p-2 py-3 text-center h-100 d-flex align-items-center justify-content-center">
                                                {{ $investor->summary ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- التواصل مع صاحب الفكرة --}}
            <div class="d-flex justify-content-center w-100 mt-4">
                <a href="#" class="btn btn-primary rounded-4 py-3 px-5 w-100"
                    title="{{ __('investor.summary.contact_owner') }}"
                    aria-label="{{ __('investor.summary.contact_owner') }}">
                    <span class="fw-semibold">
                        {{ __('investor.summary.contact_owner') }}
                    </span>
                </a>
            </div>
        </div>
    </div>
    </div>
