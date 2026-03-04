<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="fi-ac-actions mt-6">
            @foreach ($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>
</x-filament-panels::page>
