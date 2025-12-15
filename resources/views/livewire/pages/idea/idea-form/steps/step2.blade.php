<div>
    <style>
        .country-choice {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
        }

        /* النص */
        .country-text {
            line-height: 1.3;
            font-weight: 600;
            color: #1e293b;
            transition: color 0.3s ease;
        }

        /* علامة الصح في الزاوية */
        .check-indicator {
            position: absolute;
            top: 50%;
            transform: translateY(-50%) scale(0);
            font-size: 1.2rem;
            color: white;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        /* للغة الإنجليزية - يمين */
        html[dir="ltr"] .check-indicator {
            right: 12px;
        }

        /* للغة العربية - يسار */
        html[dir="rtl"] .check-indicator {
            left: 12px;
        }

        /* hover */
        @media (hover: hover) {
            .country-choice:hover:not(.disabled) {
                border-color: #667eea;
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(102, 126, 234, 0.15);
            }
        }

        /* selected */
        .btn-check:checked+.country-choice {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        /* النص عند الاختيار */
        .btn-check:checked+.country-choice .country-text {
            color: white;
        }

        /* علامة الصح في الزاوية عند الاختيار */
        .btn-check:checked+.country-choice .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        /* disabled state */
        .btn-check:disabled+.country-choice {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-check:disabled+.country-choice:hover {
            transform: none;
            box-shadow: none;
            border-color: #c7d2fe;
        }

        /* شاشات أكبر */
        @media (min-width: 768px) {
            .country-choice {
                padding: 16px 18px;
                font-size: 16px;
            }
        }
    </style>

    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step2.subtitle') }}" />

    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4" x-data="{ limit: 3 }">
        <div class="row g-2 g-md-3">
            @foreach ($options as $index => $country)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="checkbox"
                           class="btn-check"
                           id="country-{{ $index }}"
                           name="countries[]"
                           wire:model="countries"
                           value="{{ $country['code'] }}"
                           x-bind:disabled="$wire.countries.length >= limit && !$wire.countries.includes('{{ $country['code'] }}')">
                    <label for="country-{{ $index }}"
                           class="country-choice w-100"
                           x-bind:class="{ 'disabled': $wire.countries.length >= limit && !$wire.countries.includes('{{ $country['code'] }}') }">
                        <span class="country-text">{{ $country['name'] }}</span>
                        <i class="bi bi-check-circle-fill check-indicator"></i>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    @error('countries')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
