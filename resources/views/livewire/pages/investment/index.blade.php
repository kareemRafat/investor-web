<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <!-- عنوان الصفحة -->
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    صندوق الإستثمار
                </h5>
            </div>

            <div class="row mx-0 px-0 g-2">
                @forelse($investors as $investor)
                    <div class="col-12" wire:key="investor-{{ $investor->id }}">
                        <div class="card border-0 shadow-sm rounded-8 position-relative">
                            <!-- index -->
                            <div class="bg-custom position-absolute top-0 end-0 bg_idea_num rounded-circle m-1"
                                style="background-color: #0d6efd; width: 30px; height: 30px;">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <span class="text-white fw-bold fs-6">{{ $loop->iteration }}</span>
                                </div>
                            </div>

                            <div class="card-body py-0">
                                <div class="d-flex flex-column">
                                    <div class="card bg-transparent border-0 py-0">
                                        <div class="card-body py-0 my-0">
                                            <div class="row mx-0 px-0 my-0 py-0 align-items-center">
                                                <!-- المجال الاستثماري -->
                                                <div class="col-lg-3 col-md-6 col-12 p-4">
                                                    <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                        <span>المجال الاستثماري:</span>
                                                        <span
                                                            class="text-primary">{{ __("investor.steps.step1.options.{$investor->investor_field}") }}</span>
                                                    </h6>
                                                </div>

                                                <!-- رأس المال + الدول -->
                                                <div
                                                    class="col-lg-4 col-md-6 col-12 p-4 border-start border-end border_custom_idea">
                                                    <h6 class="fw-bold mb-2">
                                                        <span class="d-block mb-2">رأس المال المعروض =</span>

                                                        @php
                                                            $contribution = $investor->contributions;
                                                            $moneyLabel = null;

                                                            if ($contribution) {
                                                                if (
                                                                    $contribution->relationLoaded(
                                                                        'contributionRange',
                                                                    ) &&
                                                                    $contribution->contributionRange
                                                                ) {
                                                                }
                                                                // جرب الـ accessor
                                                                elseif ($contribution->money_contributions) {
                                                                    $moneyLabel = $contribution->getMoneyContributionLabelAttribute();
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($moneyLabel)
                                                            <span class="text-success">
                                                                {{ str_replace('<br>', '', $moneyLabel) }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted">غير محدد</span>
                                                        @endif
                                                    </h6>

                                                    <h6 class="fw-bold mb-0 mt-3">
                                                        مرغوب فى تنفيذه فى
                                                        <span class="text-muted small" style="line-height: 25px">
                                                            @forelse($investor->countries as $country)
                                                                @php
                                                                    $options = __('investor.steps.step2.options');
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

                                                <!-- الموارد -->
                                                <div class="col-lg-4 col-md-6 col-12 p-4">
                                                    <h6 class="fw-bold mb-0 line-height-1">
                                                        تتوفر الموارد التالية:
                                                    </h6>
                                                    <p class="text-muted small mt-2 mb-0">
                                                        @php
                                                            $resources = [];

                                                            if ($investor->resources) {
                                                                if ($investor->resources->company === 'yes') {
                                                                    $resources[] = 'شركة قائمة';
                                                                }
                                                                if ($investor->resources->space_type) {
                                                                    $resources[] =
                                                                        'مساحة: ' . $investor->resources->space_type;
                                                                }
                                                                if ($investor->resources->staff === 'yes') {
                                                                    $staffText = 'موظفون';
                                                                    if ($investor->resources->staff_number) {
                                                                        $staffText .=
                                                                            ' (' .
                                                                            $investor->resources->staff_number .
                                                                            ')';
                                                                    }
                                                                    $resources[] = $staffText;
                                                                }
                                                                if ($investor->resources->workers === 'yes') {
                                                                    $workersText = 'عمال';
                                                                    if ($investor->resources->workers_number) {
                                                                        $workersText .=
                                                                            ' (' .
                                                                            $investor->resources->workers_number .
                                                                            ')';
                                                                    }
                                                                    $resources[] = $workersText;
                                                                }
                                                                if ($investor->resources->equipment === 'yes') {
                                                                    $resources[] = 'معدات وآليات';
                                                                }
                                                                if ($investor->resources->software === 'yes') {
                                                                    $resources[] = 'برمجيات';
                                                                }
                                                                if ($investor->resources->executive_spaces === 'yes') {
                                                                    $resources[] = 'مكاتب تنفيذية';
                                                                }
                                                            }
                                                        @endphp

                                                        @if (count($resources) > 0)
                                                            {{ implode('، ', $resources) }}
                                                        @else
                                                            لا توجد موارد محددة
                                                        @endif
                                                    </p>
                                                </div>

                                                <!-- زر تفاصيل -->
                                                <div class="col-md-1 col-12">
                                                    <a class="btn underline d-flex gap-2 align-items-center text-primary"
                                                        wire:navigate href="{{ route('investor.info', $investor->id) }}">
                                                        <span>تفاصيل</span>
                                                        <i class="bi bi-arrow-left fw-bold mt-1"></i>
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
                            لا توجد طلبات استثمار حالياً
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- زر تحميل المزيد -->
            @if ($hasMore)
                <div class="d-flex align-items-center gap-2 justify-content-center mt-4">
                    <button type="button" wire:click="loadMore" wire:loading.attr="disabled" wire:target="loadMore"
                        class="btn btn-primary py-2 px-4">
                        <span class="small fw-bold" wire:loading.remove wire:target="loadMore">
                            عرض المزيد
                        </span>
                        <span class="small fw-bold" wire:loading wire:target="loadMore">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            جاري التحميل...
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
