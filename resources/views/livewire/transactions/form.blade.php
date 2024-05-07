<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Номер транзакції</x-label>
            <x-input wire:model="transaction_id" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Номер карти</x-label>
            <x-input wire:model="card_number" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Отримувач</x-label>
            <x-input wire:model="receiver" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Категорія</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="category_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Підписка</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="subscription_date" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->date }}">{{ $subscription->date }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </div>

    <button type="submit" class="mt-4 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
