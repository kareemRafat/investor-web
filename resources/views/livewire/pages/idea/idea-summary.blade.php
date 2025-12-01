<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">

            <!-- عنوان الصفحة -->
            <div
                class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex justify-content-center gap-0 gap-md-3 gap-lg-4 flex-wrap">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    ملخص استثمارك المميز
                </h5>
            </div>

            <div class="d-flex flex-column gap-3">

                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <div class="mb-2">
                        <strong>السيد: {{ auth()->user()->name ?? 'المستخدم' }}</strong>
                    </div>
                    <h6 class="fw-bold mb-0">
                        لقد تم إدراج فكرتك في صندوق الأفكار، نتمنى أن تجد الطرف المناسب
                        لتنفيذها وفق متطلباتك.
                    </h6>
                </div>

                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <h6 class="fw-bold mb-0">
                        القائمة أدناه تحتوي على العروض الاستثمارية المتوافقة / القريبة من متطلبات تنفيذ فكرتك، نأمل أن
                        تجد المناسب منها:
                    </h6>
                </div>

                <div class="row mx-0 px-0 g-2">

                    @forelse($investors as $investor)
                        <div class="col-12" wire:key="investor-{{ $investor->id }}">
                            <div class="card border-0 shadow-sm rounded-8 position-relative">

                                <div class="bg-custom position-absolute top-0 end-0 bg_idea_num rounded-circle m-1 mt-4"
                                    style="background-color: #0d6efd; width: 30px; height: 30px;">
                                    <div class="d-flex align-items-center justify-content-center h-100">
                                        <span class="text-white fw-bold fs-6">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body py-0">
                                    <div class="d-flex flex-column">
                                        <div class="card bg-transparent border-0 py-0">
                                            <div class="card-body py-0 my-0">
                                                <div class="row mx-0 px-0 my-0 py-0 align-items-center">

                                                    <div class="col-lg-3 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                            <span> مستثمر في قطاع: </span>
                                                            <span
                                                                class="text-primary">{{ __("idea.steps.step1.options.{$investor->investor_field}") }}</span>

                                                        </h6>
                                                    </div>

                                                    <div
                                                        class="col-lg-4 col-md-6 col-12 p-4 border-start border-end border_custom_idea">
                                                        <h6 class="fw-bold mb-2">
                                                            رأس المال المعروض =
                                                            <span class="text-success" dir="ltr">
                                                                @php
                                                                    $contributionLabel =
                                                                        $investor->contributions
                                                                            ->money_contribution_label ?? null;
                                                                @endphp

                                                                {!! $contributionLabel ?? 'لايوجد' !!}

                                                                @if ($contributionLabel && $contributionLabel != 0)
                                                                    SAR
                                                                @endif
                                                            </span>
                                                        </h6>
                                                        <h6 class="fw-bold mb-0 mt-3">
                                                            مرغوب فى تنفيذه فى:
                                                            <span class="text-muted small">
                                                                @forelse($investor->countries as $country)
                                                                    @php
                                                                        $options = __('idea.steps.step2.options');
                                                                        $countryOption = collect($options)->firstWhere(
                                                                            'code',
                                                                            $country->country,
                                                                        );
                                                                        $countryName =
                                                                            $countryOption['name'] ?? $country->country;
                                                                    @endphp

                                                                    {{ $countryName }}@if (!$loop->last)
                                                                        -
                                                                    @endif
                                                                @empty
                                                                    -
                                                                @endforelse
                                                            </span>
                                                        </h6>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 line-height-1">
                                                            تتوفر الموارد التالية:
                                                        </h6>
                                                        <p class="text-muted small mt-2 mb-0">
                                                            @php
                                                                $resources = [];
                                                                if ($investor->resources?->company === 'yes') {
                                                                    $resources[] = 'شركة قائمة';
                                                                }
                                                                if ($investor->resources?->staff === 'yes') {
                                                                    $resources[] =
                                                                        'موظفون (' .
                                                                        $investor->resources->staff_number .
                                                                        ')';
                                                                }
                                                                if ($investor->resources?->equipment === 'yes') {
                                                                    $resources[] = 'معدات وآليات';
                                                                }
                                                                if ($investor->resources?->executive_spaces === 'yes') {
                                                                    $resources[] = 'مكاتب تنفيذية';
                                                                }
                                                                if ($investor->resources?->website === 'yes') {
                                                                    $resources[] = 'موقع الكتروني';
                                                                }
                                                            @endphp

                                                            @if (count($resources) > 0)
                                                                {{ implode('، ', $resources) }}
                                                            @else
                                                                لا توجد موارد إضافية محددة.
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="col-md-1 col-12 ">

                                                        <a class="btn underline d-flex gap-2 align-items-center text-primary"
                                                            wire:navigate
                                                            href="{{ route('investor.info', $investor->id) }}">
                                                            <span>More</span>
                                                            <i class="bi bi-arrow-left fw-bold"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                لا توجد عروض استثمارية مطابقة تماماً لفكرتك حالياً، ولكن سيتم إشعارك فور توفر مستثمر
                                مهتم.
                            </div>
                        </div>
                    @endforelse

                </div>

                @if ($investors->count() >= $amount)
                    <div class="d-flex align-items-center gap-2 justify-content-center my-4">
                        <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                            class="btn btn-primary py-3 px-4">
                            <span class="small fw-bold" wire:loading.remove>
                                عرض المزيد
                            </span>
                            <span class="small fw-bold" wire:loading>
                                جاري التحميل...
                            </span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
