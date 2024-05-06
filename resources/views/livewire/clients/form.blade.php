<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>ПІБ</x-label>
            <x-input wire:model="full_name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Номер телефону</x-label>
            <x-input wire:model="phone" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Дата народження</x-label>
            <x-input wire:model="date_of_birth" class="block mt-1 w-full" type="date" required />
        </div>

        <div class="sm:col-span-3">
            <x-label>Транзакція</x-label>
            <x-select class="mt-1 block w-full" wire:model="transaction_id">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($transactions as $transaction)
                        <option value="{{ $transaction->transaction_id }}" wire:key="{{ $transaction->transaction_id }}">
                            {{ $transaction->transaction_id }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label>Платіжна система</x-label>
            <x-select class="mt-1 block w-full" wire:model="payment_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->name }}" wire:key="{{ $payment->name }}">
                            {{ $payment->name }}
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
