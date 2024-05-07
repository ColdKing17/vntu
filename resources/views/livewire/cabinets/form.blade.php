<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Номер</x-label>
            <x-input wire:model="number" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Кількість працівників</x-label>
            <x-input wire:model="workers_amount" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Поверх</x-label>
            <x-input wire:model="floor" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Площа</x-label>
            <x-input wire:model="square" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Наявність факсу</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="has_fax" required>
                <x-slot name="options">
                    <option value=""></option>
                    <option value="1">Так</option>
                    <option value="0">Ні</option>
                </x-slot>
            </x-select>
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
