<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Назва</x-label>
            <x-input wire:model="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Підтримувана валюта</x-label>
            <x-select class="mt-1 block w-full" wire:model="supported_currency_symbol" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->symbol }}" wire:key="{{ $currency->symbol }}">
                            {{ $currency->symbol }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Рівень безпеки та захисту даних</x-label>
            <x-input wire:model="security_level" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Максимальна сума та обмеження транзакцій</x-label>
            <x-input wire:model="max_sum" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Комісія</x-label>
            <x-input wire:model="commission" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Термінал</x-label>
            <x-select class="mt-1 block w-full" wire:model="terminal_internal_number" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($terminals as $terminal)
                        <option value="{{ $terminal->internal_number }}" wire:key="{{ $terminal->internal_number }}">
                            {{ $terminal->internal_number }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
