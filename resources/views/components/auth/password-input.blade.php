@props(['name', 'id' => null, 'placeholder' => 'Enter your password', 'error' => null])
<div class="position-relative" x-data="{ show: false }">
    <input :type="show ? 'text' : 'password'" class="form-control @if ($error) is-invalid @endif"
        id="{{ $id ?? $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" />
    <!-- Toggle eye -->
    <i class="bi password-toggle cursor-pointer" @click="show = !show"
        :class="show ? 'bi-eye' : 'bi-eye-slash'">
    </i>
</div>
@if ($error)
    <div class="text-danger small">
        {{ $error }}
    </div>
@endif
