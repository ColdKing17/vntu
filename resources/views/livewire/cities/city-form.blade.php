<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Назва</x-label>
            <x-input wire:model="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Площа</x-label>
            <x-input wire:model="area" class="block mt-1 w-full" type="number" step="0.1" min="0" required />
        </div>

        <div class="sm:col-span-6">
            <x-label required>Опис</x-label>
            <x-textarea wire:model="description" class="block mt-1 w-full" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Населення</x-label>
            <x-input wire:model="population" class="block mt-1 w-full" type="number" step="1" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Дата заснування</x-label>
            <x-input wire:model="date_of_establishment" class="block mt-1 w-full" type="date" required />
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
