<x-filament-panels::page>
    @if ($this->getRecord()->status->value === 'rejected')
        <div
            class="bg-red-100 border border-red-400 text-red-800 px-6 py-4 rounded-lg shadow-sm flex items-start gap-4 mb-[-20px]">
            <x-heroicon-o-information-circle class="h-8 w-8" />
            <div>
                <p class="font-semibold text-lg">هذه الفكرة تم رفضها</p>
                <p class="text-sm mt-1"> السبب : <span class="font-medium">{{ $this->getRecord()->admin_note }}</span></p>
            </div>
        </div>
    @endif

    <div class="space-y-6 bg-white p-6 rounded-lg shadow-sm">
        {{-- idea Title Card --}}
        <div
            class="mb-6 px-4 py-2 bg-gray-50 dark:bg-gray-900
           rounded-lg border border-gray-200 dark:border-gray-800">
            <span
                class="inline-flex items-center rounded-full
               bg-blue-50 dark:bg-blue-950
               text-blue-600 dark:text-blue-400
               px-3 py-2 text-xs font-semibold mb-3">
                {{ app()->getLocale() === 'ar' ? 'الفكرة الاستثمارية' : 'Investment Idea' }}
            </span>
            <div class="flex items-start gap-3">
                {{-- Icon --}}
                <div
                    class="flex items-center justify-center w-9 h-9 rounded-md
                   bg-purple-100 dark:bg-purple-900
                   text-purple-600 dark:text-purple-400 flex-shrink-0">
                    <x-filament::icon icon="heroicon-o-light-bulb" class="w-5 h-5" />
                </div>

                {{-- Title + Quote --}}
                <div class="flex-1 self-center">
                    <h1 class="text-base font-semibold text-gray-900 dark:text-gray-100 leading-snug">
                        {{ $this->getRecord()->title }}
                    </h1>
                </div>
            </div>
        </div>
        {{-- User & Created Date Card --}}
        <div
            class="p-4 bg-purple-50 dark:bg-purple-950 rounded-lg shadow-sm border border-purple-100 dark:border-purple-900">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                {{-- User Info (Right - First on Mobile) --}}
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <div
                            class="w-10 h-10 rounded-full bg-purple-600 dark:bg-purple-500 flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($this->getRecord()->user->name ?? 'U', 0, 1)) }}
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-gray-600 dark:text-gray-400 font-medium">
                                {{ app()->getLocale() === 'ar' ? 'صاحب الفكرة' : 'Idea Owner' }}
                            </span>
                        </div>
                        <div class="text-base font-medium text-gray-900 dark:text-gray-100">
                            {{ $this->getRecord()->user->name ?? '-' }}
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $this->getRecord()->user->email ?? '-' }}
                        </div>
                    </div>
                </div>

                {{-- Created Date (Left - Second on Mobile) --}}
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <x-filament::icon icon="heroicon-o-calendar"
                            class="w-4 h-4 text-purple-600 dark:text-purple-400" />
                        <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                            {{ app()->getLocale() === 'ar' ? 'تاريخ الإنشاء' : 'Created At' }}
                        </span>
                    </div>
                    <div class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                        {{ $this->getRecord()->created_at?->locale(app()->getLocale())->isoFormat('DD MMMM YYYY') }}
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $this->getRecord()->created_at?->diffForHumans() }}
                    </div>
                </div>

            </div>
        </div>
        {{-- Section 1: Core Info --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Project --}}
            <div
                class="p-4 bg-blue-50 dark:bg-blue-950 rounded-lg shadow-sm border border-blue-100 dark:border-blue-900">
                <div class="flex items-center gap-2 mb-2">
                    <x-filament::icon icon="heroicon-o-light-bulb" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('idea.steps.step10.project') }}
                    </span>
                </div>
                <h6 class="font-semibold text-blue-700 dark:text-blue-300 text-sm">
                    {{ __('idea.steps.step1.options.' . ($this->getRecord()->idea_field ?? '-')) }}
                </h6>
            </div>

            {{-- Capital --}}
            <div
                class="p-4 bg-green-50 dark:bg-green-950 rounded-lg shadow-sm border border-green-100 dark:border-green-900">
                <div class="flex items-center gap-2 mb-2">
                    <x-filament::icon icon="heroicon-o-banknotes" class="w-5 h-5 text-green-600 dark:text-green-400" />
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('idea.steps.step10.capital') }}
                    </span>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    @forelse($this->getRecord()->costs as $cost)
                        <div class="font-medium">{!! app()->getLocale() === 'ar' ? $cost->range->label_ar : $cost->range->label_en !!}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ __('idea.steps.step3.types.' . ($cost->cost_type ?? 'unspecified')) }}
                        </div>
                    @empty
                        <span class="text-gray-400 dark:text-gray-500">{{ __('idea.common.unspecified') }}</span>
                    @endforelse
                </div>
            </div>

            {{-- Expected Profit --}}
            <div
                class="p-4 bg-yellow-50 dark:bg-yellow-950 rounded-lg shadow-sm border border-yellow-100 dark:border-yellow-900">
                <div class="flex items-center gap-2 mb-2">
                    <x-filament::icon icon="heroicon-o-chart-bar"
                        class="w-5 h-5 text-yellow-600 dark:text-yellow-400" />
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('idea.steps.step10.expected_profit') }}
                    </span>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    @forelse($this->getRecord()->profits as $profit)
                        <div class="font-medium">{!! app()->getLocale() === 'ar' ? $profit->range->label_ar : $profit->range->label_en !!}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ __('idea.steps.step4.types.' . (str_replace('-', '_', $profit->profit_type) ?? '-')) }}
                        </div>
                    @empty
                        <span class="text-gray-400 dark:text-gray-500">{{ __('idea.common.unspecified') }}</span>
                    @endforelse
                </div>
            </div>

            {{-- Best Countries --}}
            <div
                class="p-4 bg-indigo-50 dark:bg-indigo-950 rounded-lg shadow-sm border border-indigo-100 dark:border-indigo-900">
                <div class="flex items-center gap-2 mb-2">
                    <x-filament::icon icon="heroicon-o-globe-alt"
                        class="w-5 h-5 text-indigo-600 dark:text-indigo-400" />
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                        {{ __('idea.steps.step10.best_countries') }}
                    </span>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    @forelse($this->getRecord()->countries as $country)
                        @php
                            $countryOption = collect(__('idea.steps.step2.options'))->firstWhere(
                                'code',
                                $country->country,
                            );
                            $countryName = $countryOption['name'] ?? $country->country;
                        @endphp
                        {{ $countryName }}@if (!$loop->last)
                            ,
                        @endif
                    @empty
                        <span class="text-gray-400 dark:text-gray-500">{{ __('idea.common.unspecified') }}</span>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Section 2: Contact & Resources --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            {{-- Contact Way --}}
            <div
                class="col-span-3 sm:col-span-1 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-phone" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('idea.steps.step10.contact_way') }}</h6>
                </div>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <li class="flex items-center gap-2">
                        <x-filament::icon icon="heroicon-o-device-phone-mobile"
                            class="w-4 h-4 text-green-600 dark:text-green-400" />
                        {{ app()->getLocale() === 'ar' ? 'الهاتف النقال' : 'Mobile Phone' }}
                    </li>
                    <li class="flex items-center gap-2">
                        <x-filament::icon icon="heroicon-o-envelope" class="w-4 h-4 text-red-600 dark:text-red-400" />
                        {{ app()->getLocale() === 'ar' ? 'البريد الإلكتروني' : 'Email' }}
                    </li>
                </ul>
            </div>

            {{-- Resources --}}
            <div
                class="col-span-3 p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-clipboard-document-list"
                        class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('idea.steps.step10.resources') }}
                    </h6>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @forelse(array_slice($this->getRecord()->resources->translated_requirements ?? [], 0, 6) as $index => $resource)
                        <div class="flex items-start gap-2">
                            <span
                                class="inline-flex items-center justify-center w-6 h-6 bg-blue-600 dark:bg-blue-500 text-white rounded-full text-xs font-medium flex-shrink-0">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-sm text-gray-800 dark:text-gray-200">{{ $resource }}</span>
                        </div>
                    @empty
                        <div class="col-span-2 text-center text-gray-400 dark:text-gray-500 text-sm">
                            {{ __('idea.common.unspecified') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Section 3: Financial --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            {{-- Contributions --}}
            <div
                class="p-4 bg-orange-50 dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-user-plus" class="w-5 h-5 text-green-600 dark:text-green-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('idea.steps.step10.contribution') }}</h6>
                </div>
                @forelse ($this->getRecord()->contributions as $contribution)
                    @php $lines = $contribution->formatted_contribution ?? ['-']; @endphp
                    <ul class="list-disc list-inside space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        @foreach ($lines as $line)
                            <li>{{ $line }}</li>
                        @endforeach
                    </ul>
                @empty
                    <span class="text-gray-400 dark:text-gray-500 text-sm">{{ __('idea.common.unspecified') }}</span>
                @endforelse
            </div>

            {{-- Returns --}}
            <div
                class="p-4 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-trophy" class="w-5 h-5 text-yellow-600 dark:text-yellow-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('idea.steps.step10.returns') }}
                    </h6>
                </div>
                <ul class="list-disc list-inside space-y-1 text-sm text-gray-700 dark:text-gray-300">
                    @forelse($this->getRecord()->returns->formatted_returns ?? [] as $return)
                        <li>{{ $return }}</li>
                    @empty
                        <li class="text-gray-400 dark:text-gray-500">{{ __('idea.common.unspecified') }}</li>
                    @endforelse
                </ul>
            </div>

            {{-- Capital Distribution --}}
            <div
                class="p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-chart-pie"
                        class="w-5 h-5 text-indigo-600 dark:text-indigo-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('idea.steps.step10.capital_distribution') }}</h6>
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300 flex flex-wrap gap-1">
                    @if (optional($this->getRecord()->expenses)->capital_distribution)
                        @foreach (optional($this->getRecord()->expenses)->capital_distribution as $expense)
                            <span class="inline-block">{{ $expense }}</span>
                            @if (!$loop->last)
                                <span class="text-gray-400">+</span>
                            @endif
                        @endforeach
                    @else
                        <span class="text-gray-400 dark:text-gray-500">{{ __('idea.common.unspecified') }}</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Section 4: Summary & Attachments --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            {{-- Summary --}}
            <div
                class="col-span-3 p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <x-filament::icon icon="heroicon-o-document-text"
                            class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                        <h6 class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('idea.steps.step10.summary') }}</h6>
                    </div>
                    <x-filament::button tag="a"
                        href="{{ route('filament.admin.resources.ideas.edit', ['record' => $this->getRecord()->id]) }}"
                        color="blue" size="sm" icon="heroicon-o-pencil">
                        تعديل الملخص
                    </x-filament::button>
                </div>
                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                    {{ $this->getRecord()->summary ?? __('idea.common.unspecified') }}
                </p>
            </div>

            {{-- Attachments --}}
            <div
                class="col-span-1 p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2 mb-3">
                    <x-filament::icon icon="heroicon-o-paper-clip" class="w-5 h-5 text-gray-600 dark:text-gray-400" />
                    <h6 class="font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('idea.steps.step10.attachments') }}</h6>
                </div>
                <div class="space-y-2">
                    @forelse($this->getRecord()->attachments as $file)
                        <a href="{{ Storage::url($file->path) }}" target="_blank"
                            class="flex items-center gap-2 p-2 bg-gray-50 dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                            <x-filament::icon icon="heroicon-o-document"
                                class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0" />
                            <div class="flex-1 min-w-0">
                                <div
                                    class="truncate text-sm font-medium text-gray-900 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400">
                                    {{ $file->original_name ?? basename($file->path) }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $file->size_kb }}</div>
                            </div>
                            <x-filament::icon icon="heroicon-o-arrow-down-tray"
                                class="w-4 h-4 text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 flex-shrink-0" />
                        </a>
                    @empty
                        <div class="text-center text-gray-400 dark:text-gray-500 text-sm">
                            {{ __('idea.common.unspecified') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
