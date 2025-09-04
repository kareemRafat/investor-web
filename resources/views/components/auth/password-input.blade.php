@props([
    'name',
    'id' => null,
    'label' => 'Password',
    'placeholder' => 'Enter your password'
])

<div class="form-floating mb-3 position-relative" x-data="{ show: false }">
    <input :type="show ? 'text' : 'password'" class="form-control" id="{{ $id ?? $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" />

    <!-- Toggle eye -->
    <i class="bi cursor-pointer"
        :class="show
            ?
            'bi-eye position-absolute start-0 top-50 translate-middle-y me-3' :
            'bi-eye-slash position-absolute start-0 top-50 translate-middle-y me-3'"
        @click="show = !show">
    </i>

    <label for="{{ $id ?? $name }}" class="form-label">{{ strtoupper($label) }}</label>

    @if ($name === 'password')
        <!-- Error message -->
        @error('password')
            <div class="text-danger mt-2 fw-semibold">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ $message }}
            </div>
        @enderror
    @endif
</div>
