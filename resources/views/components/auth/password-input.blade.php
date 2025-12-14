@props(['name', 'id' => null, 'label' => 'Password', 'placeholder' => 'Enter your password', 'error' => null])
<div class="form-floating mb-3 position-relative" x-data="{ show: false }">
    <input :type="show ? 'text' : 'password'" class="form-control @if ($error) is-invalid @endif"
        id="{{ $id ?? $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" />
    <!-- Toggle eye -->
    <i class="bi cursor-pointer"
        :class="show
            ?
            'bi-eye position-absolute start-0 top-50 translate-middle-y me-3' :
            'bi-eye-slash position-absolute start-0 top-50 translate-middle-y me-3'"
        @click="show = !show">
    </i>
    <label for="{{ $id ?? $name }}" class="form-label">{{ strtoupper($label) }}</label>
</div>
@if ($error)
    <div class="text-danger small">
        {{ $error }}
    </div>
@endif
