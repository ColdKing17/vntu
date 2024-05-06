<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Дата звернення</x-label>
            <x-input wire:model="date" class="block mt-1 w-full" type="date" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Статус</x-label>
            <x-input wire:model="status" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Закритий</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="closed" required>
                <x-slot name="options">
                    <option value=""></option>
                    <option value="1">Так</option>
                    <option value="0">Ні</option>
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Працівник</x-label>
            <x-select class="mt-1 block w-full" wire:model="worker_full_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($workers as $worker)
                        <option value="{{ $worker->full_name }}" wire:key="{{ $worker->full_name }}">
                            {{ $worker->full_name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Платіжна система</x-label>
            <x-select class="mt-1 block w-full" wire:model="payment_name" required>
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
