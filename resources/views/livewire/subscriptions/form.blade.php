<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Сумма</x-label>
            <x-input wire:model="amount" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Дата</x-label>
            <x-input wire:model="date" class="block mt-1 w-full" type="date" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Спосіб оплати</x-label>
            <x-input wire:model="payment_method" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Тривалість</x-label>
            <x-input wire:model="duration" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Клієнт</x-label>
            <x-select class="mt-1 block w-full" wire:model="client_full_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($clients as $client)
                        <option value="{{ $client->full_name }}" wire:key="{{ $client->full_name }}">
                            {{ $client->full_name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Валюта</x-label>
            <x-select class="mt-1 block w-full" wire:model="currency_symbol" required>
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
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
