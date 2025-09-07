@props(['route', 'label'])

<a href="{{ route($route) }}" wire:navigate @class([
    'py-2 rounded transition',
    'active text-primary fw-bold' => request()->routeIs($route),
    'text-dark' => !request()->routeIs($route),
])
    style="{{ request()->routeIs($route) ? 'color:#0d6efd !important; font-weight:700 !important;' : '' }}">
    {{ $label }}
</a>
