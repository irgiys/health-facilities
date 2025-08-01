<x-filament::page>
    <form wire:submit.prevent="calculate">
        {{ $this->form }}

        <div class="mt-6 flex items-center gap-4">
            <x-filament::button type="submit">
                Hitung Jarak
            </x-filament::button>

            @if ($result !== null)
                <div class="text-success-900">
                    <strong>Hasil:</strong> {{ number_format($result, 4) }} km
                </div>
            @endif
        </div>
    </form>
</x-filament::page>
