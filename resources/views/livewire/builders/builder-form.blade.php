<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Назва</x-label>
            <x-input wire:model="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Електронна пошта</x-label>
            <x-input wire:model="email" class="block mt-1 w-full" type="email" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Досвід</x-label>
            <x-input wire:model="experience" class="block mt-1 w-full" type="number" step="1" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Номер телефону</x-label>
            <x-input wire:model="phone_number" class="block mt-1 w-full" type="text" required />
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
