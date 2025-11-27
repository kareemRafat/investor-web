@props(['route', 'label'])

<a href="{{ route($route) }}" wire:navigate @class([
    'py-2 rounded transition',
    'active text-primary small' => request()->routeIs($route),
    'text-dark text-muted small' => !request()->routeIs($route),
])
    style="{{ request()->routeIs($route) ? 'color:#0d6efd !important;' : '' }}">
    {{ $label }}
</a>
