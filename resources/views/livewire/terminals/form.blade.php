<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Внутрішній номер</x-label>
            <x-input wire:model="internal_number" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Максимальна кількість операцій</x-label>
            <x-input wire:model="max_supported_amount" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>ТРЦ</x-label>
            <x-select class="mt-1 block w-full" wire:model="mall_address" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($malls as $mall)
                        <option value="{{ $mall->address }}" wire:key="{{ $mall->address }}">
                            {{ $mall->address }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Місто</x-label>
            <x-select class="mt-1 block w-full" wire:model="city_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($cities as $city)
                        <option value="{{ $city->name }}" wire:key="{{ $city->name }}">
                            {{ $city->name }}
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
