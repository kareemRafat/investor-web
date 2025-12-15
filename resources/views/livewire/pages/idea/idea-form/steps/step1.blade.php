<div>
    <style>
        .idea-choice {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid #dee3f7;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
        }

        .choice-text {
            line-height: 1.3;
            font-weight: 600;
            color: #1e293b;
            transition: color 0.3s ease;
        }

        .check-indicator {
            position: absolute;
            top: 50%;
            transform: translateY(-50%) scale(0);
            font-size: 1.2rem;
            color: white;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        html[dir="ltr"] .check-indicator {
            right: 12px;
        }

        html[dir="rtl"] .check-indicator {
            left: 12px;
        }

        /* selected */
        .btn-check:checked+.idea-choice {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-check:checked+.idea-choice .choice-text {
            color: white;
        }

        .btn-check:checked+.idea-choice .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }
        /* شاشات أكبر */
        @media (min-width: 768px) {
            .idea-choice {
                padding: 16px 18px;
                font-size: 16px;
            }
        }
    </style>
    {{-- step header --}}
    <x-pages.idea-wizard.idea-header title="{{ __('pages/mainpage.submit_idea') }}"
        subtitle="{{ __('idea.steps.step1.subtitle') }}" />
    <div class="step_height bg-white rounded-4 shadow-lg p-3 p-md-4">
        <div class="row g-2 g-md-3">
            @foreach ($ideaOptions as $key => $label)
                <div class="col-12 col-sm-6 col-lg-3">
                    <input type="radio" class="btn-check" wire:model="ideaField" id="idea-{{ $key }}"
                        value="{{ $key }}" name="ideaField">
                    <label for="idea-{{ $key }}" class="idea-choice w-100">
                        <span class="choice-text">{{ $label }}</span>
                        <i class="bi bi-check-circle-fill check-indicator"></i>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    @error('ideaField')
        <div class="error-message-wrapper">
            <div class="alert alert-danger rounded-3 shadow-sm mt-3 mx-auto" style="max-width: 500px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
