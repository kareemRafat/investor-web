@props(['title', 'subtitle', 'currentStep', 'totalSteps'])

<div class="bg-light text-dark rounded-8 shadow-sm mb-3 d-flex flex-column align-items-center justify-content-center gap-2 position-relative overflow-hidden p-3" 
     style="position: sticky; top: 0; z-index: 999; border-bottom: 3px solid #667eea;">
    
    <!-- Step Indicator Badge -->
    <div class="position-absolute top-0 end-0 mt-2 me-3">
        <span class="badge rounded-pill shadow-sm d-flex align-items-center gap-1" 
              style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 0.85rem; padding: 8px 16px;">
            <span>{{ __('investor.form.step_number', ['current' => $currentStep, 'total' => $totalSteps]) }}</span>
        </span>
    </div>

    <!-- Title -->
    <h5 class="mb-0 fw-bold text-center text-primary" style="font-size: 1.25rem;">
        {{ $title }}
    </h5>

    <!-- Subtitle -->
    <p class="mb-0 text-muted fw-semibold text-center" style="font-size: 1rem; max-width: 90%;">
        {{ $subtitle }}
    </p>
</div>
