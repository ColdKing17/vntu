<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>ПІБ</x-label>
            <x-input wire:model="full_name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Внутрішній номер</x-label>
            <x-input wire:model="internal_number" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Електронна пошта</x-label>
            <x-input wire:model="email" class="block mt-1 w-full" type="email" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Стаж</x-label>
            <x-input wire:model="experience" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Офіс</x-label>
            <x-select class="mt-1 block w-full" wire:model="office_address" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($offices as $office)
                        <option value="{{ $office->address }}" wire:key="{{ $office->address }}">
                            {{ $office->address }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Кабінет</x-label>
            <x-select class="mt-1 block w-full" wire:model="cabinet_number" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($cabinets as $cabinet)
                        <option value="{{ $cabinet->number }}" wire:key="{{ $cabinet->number }}">
                            {{ $cabinet->number }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
