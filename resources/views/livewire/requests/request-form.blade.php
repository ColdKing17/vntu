<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Вимоги</x-label>
            <x-input wire:model="requirements" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Бюджет</x-label>
            <x-input wire:model="budget" class="block mt-1 w-full" type="number" min="0" step="0.01" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Дата</x-label>
            <x-input wire:model="date" class="block mt-1 w-full" type="date" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Тип нерухомості</x-label>
            <x-input wire:model="property_type" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Ріелтор</x-label>
            <x-select class="mt-1 block w-full" wire:model="realtor_full_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($realtors as $realtor)
                        <option value="{{ $realtor->full_name }}" wire:key="{{ $realtor->full_name }}">
                            {{ $realtor->full_name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label>Платіж</x-label>
            <x-select class="mt-1 block w-full" wire:model="paymentData">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->date }}, {{ $payment->client_full_name }}" wire:key="{{ $payment->date }}, {{ $payment->client_full_name }}">
                            {{ $payment->date }}, {{ $payment->client_full_name }}
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
