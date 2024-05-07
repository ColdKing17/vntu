<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Адреса</x-label>
            <x-input wire:model="address" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Країна</x-label>
            <x-input wire:model="country" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Місто</x-label>
            <x-select class="mt-1 block w-full" wire:model="city_name" required>
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($cities as $city)
                        <option value="{{ $city->name }}" wire:key="{{ $city->name }}">
                            {{ $city->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="sm:col-span-3">
            <x-label required>Кількість працівників</x-label>
            <x-input wire:model="workers_amount" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label>Тікет техпідтримки</x-label>
            <x-select class="mt-1 block w-full" wire:model="ticket_date">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($tickets as $ticket)
                        <option value="{{ $ticket->date }}" wire:key="{{ $ticket->date }}">
                            {{ $ticket->date }}
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
