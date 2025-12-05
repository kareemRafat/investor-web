@props(['model'])

<input type="hidden"
       id="hidden-created-at-{{ md5($model) }}"
       wire:model="{{ $model }}"
       value="">

<script>
    console.log('Client DateTime:');
    document.addEventListener('DOMContentLoaded', function () {
        let inputId = 'hidden-created-at-{{ md5($model) }}';
        let hiddenInput = document.getElementById(inputId);
        if (hiddenInput) {
            // التاريخ حسب جهاز العميل بصيغة MySQL DATETIME
            let clientDate = new Date().toISOString().slice(0, 19).replace('T', ' ');
            console.log('Client DateTime:', clientDate);
            // تحديث الـ hidden input
            hiddenInput.value = clientDate;

            // Livewire 3: تحديث الـ property مباشرة
            if (window.Livewire) {
                @this.set('{{ $model }}', clientDate);
            }
        }
    });
</script>
