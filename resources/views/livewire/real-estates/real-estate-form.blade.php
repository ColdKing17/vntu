<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Адреса</x-label>
            <x-input wire:model="address" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Тип</x-label>
            <x-input wire:model="type" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Ціна</x-label>
            <x-input wire:model="price" class="block mt-1 w-full" type="number" min="0" step="1" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>ЖК</x-label>
            <x-select class="mt-1 block w-full" wire:model="residential_complex_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($residentialComplexes as $residentialComplex)
                        <option value="{{ $residentialComplex->name }}" wire:key="{{ $residentialComplex->name }}">
                            {{ $residentialComplex->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Район</x-label>
            <x-select class="mt-1 block w-full" wire:model="district_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($districts as $district)
                        <option value="{{ $district->name }}" wire:key="{{ $district->name }}">
                            {{ $district->name }}
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
