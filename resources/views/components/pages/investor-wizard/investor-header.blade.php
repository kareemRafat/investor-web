@props(['title', 'subtitle', 'currentStep', 'totalSteps'])

@php
    $progress = ($currentStep / $totalSteps) * 100;
    $themeColor = '#667eea';
@endphp

<div class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex flex-column align-items-center justify-content-center gap-2 position-relative overflow-hidden p-3" 
     style="position: sticky; top: 0; z-index: 999; border-bottom: 3px solid {{ $themeColor }};">
    
    <!-- Progress Bar at Top -->
    <div class="position-absolute top-0 start-0 w-100" style="height: 3px; background-color: rgba(0,0,0,0.05);">
        <div style="height: 100%; width: {{ $progress }}%; background-color: {{ $themeColor }}; transition: width 0.4s ease-in-out;"></div>
    </div>

    <!-- Step Indicator Badge -->
    <div class="position-absolute top-0 end-0 mt-2 me-3 pt-1">
        <span class="badge rounded-pill shadow-sm d-flex align-items-center gap-1" 
              style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 0.85rem; padding: 8px 16px;">
            <span>{{ __('investor.form.step_number', ['current' => $currentStep, 'total' => $totalSteps]) }}</span>
        </span>
    </div>

    <!-- Title -->
    <h5 class="mb-0 fw-bold text-center text-primary mt-2" style="font-size: 1.25rem;">
        {{ $title }}
    </h5>

    <!-- Subtitle -->
    <p class="mb-0 text-muted fw-semibold text-center" style="font-size: 1rem; max-width: 90%;">
        {{ $subtitle }}
    </p>
</div>
