<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Назва</x-label>
            <x-input wire:model="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Кількість активних підписок</x-label>
            <x-input wire:model="subscribers_amount" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Опис</x-label>
            <x-textarea wire:model="description" class="block mt-1 w-full" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Кешбек</x-label>
            <x-input wire:model="cashback" class="block mt-1 w-full" type="number" min="0" step="0.01" required />
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
