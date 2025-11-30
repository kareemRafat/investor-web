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

                <!-- رسالة الترحيب -->
                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <div class="mb-2">
                        <strong>السيد (الاسم المستعار):</strong>
                    </div>
                    <h6 class="fw-bold mb-0">
                        لقد تم إدراج استثمارك المميز في صندوق الإستثمار، نتمنى أن تجد الطرف المناسب لتنفيذه وفق
                        متطلباتك.
                    </h6>
                </div>

                <!-- رسالة الأفكار المتوافقة -->
                <div class="bg-white rounded-8 shadow-sm p-3 p-md-3 p-lg-4 pb-5">
                    <h6 class="fw-bold mb-0">
                        القائمة أدناه تحتوي على الأفكار المتميزة المتوافقة / القريبة من متطلبات تنفيذ استثمارك، نأمل
                        أن تجد المناسب منها:
                    </h6>
                </div>

                <!-- أفكار المستثمر -->
                <div class="row mx-0 px-0 g-2">
                    @forelse($matchingIdeas->take($amount) as $index => $idea)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-8 position-relative">

                                <!-- index -->
                                <div class="bg-custom position-absolute top-0 end-0 bg_idea_num rounded-circle m-1">
                                    <div class="d-flex align-items-center justify-content-center h-100">
                                        <span class="text-white fw-bold fs-6">
                                            {{ $index + 1 }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body py-0">
                                    <div class="d-flex flex-column">
                                        <div class="card bg-transparent border-0 py-0">
                                            <div class="card-body py-0 my-0">
                                                <div class="row mx-0 px-0 my-0 py-0">

                                                    <!-- عنوان الفكرة -->
                                                    <div class="col-lg-3 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 d-flex flex-column gap-3">
                                                            <span> الفكرة مقدمة في قطاع: </span>
                                                            <span
                                                                class="text-primary">{{ __("idea.steps.step1.options.{$idea->idea_field}") }}</span>

                                                        </h6>
                                                    </div>

                                                    <!-- رأس المال والدول -->
                                                    <div class="col-lg-4 col-md-6 col-12 p-4 border_custom_idea">
                                                        {{-- TODO --}}
                                                        {{-- !! need attention --}}

                                                        <h6 class="fw-bold mb-2">
                                                            رأس المال المتوقع = {{ 00 }}
                                                        </h6>

                                                        <h6 class="fw-bold mb-0 mt-3">
                                                            مرغوب فى تنفيذه فى:
                                                            <span class="text-muted small">
                                                                @forelse($idea->countries as $country)
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

                                                    <!-- الموارد -->
                                                    <div class="col-lg-5 col-md-6 col-12 p-4">
                                                        <h6 class="fw-bold mb-0 line-height-1">
                                                            تتوفر الموارد التالية:
                                                            {{ $idea->resources
                                                                ? implode(
                                                                    '، ',
                                                                    array_filter([
                                                                        $idea->resources->company == 'yes' ? 'شركة قائمة' : null,
                                                                        $idea->resources->staff == 'yes' ? 'موظفون متخصصون' : null,
                                                                        $idea->resources->workers == 'yes' ? 'عمال' : null,
                                                                        $idea->resources->executive_spaces == 'yes' ? 'مكاتب تنفيذية' : null,
                                                                        $idea->resources->equipment == 'yes' ? 'آليات ومعدات' : null,
                                                                        $idea->resources->software == 'yes' ? 'برمجيات' : null,
                                                                        $idea->resources->website == 'yes' ? 'موقع إلكتروني' : null,
                                                                    ]),
                                                                )
                                                                : 'لا يوجد بيانات موارد' }}
                                                        </h6>
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
                            <div class="bg-white rounded-8 shadow-sm p-4 text-center">
                                <h6 class="fw-bold mb-0">
                                    لا توجد أفكار متوافقة مع استثمارك حاليًا.
                                </h6>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- زر عرض المزيد -->
                @if ($amount < $matchingIdeas->count())
                    <div class="d-flex align-items-center gap-2 justify-content-center my-4">
                        <button type="button" class="btn btn-custom py-3 px-4" wire:click="loadMore">
                            <span class="small fw-bold">عرض المزيد</span>
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
