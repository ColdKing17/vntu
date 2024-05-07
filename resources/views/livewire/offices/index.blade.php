<x-table title="Офіси">
    <x-slot:button>
        <a href="{{ route('offices.create') }}" wire:navigate class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Додати офіс
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Адреса</x-label>
            <x-input wire:model.live="address" class="block mt-1 w-full" type="text" />
        </div>

        <div class="inline mr-4">
            <x-label>Тікет техпідтримки</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="ticket_date">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($tickets as $ticket)
                        <option value="{{ $ticket->date }}">{{ $ticket->date }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Адреса</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Країна</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Місто</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Кількість працівників</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Тікет техпідтримки</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->address }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->country }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->city_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->workers_amount }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->ticket_date }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('offices.edit', ['address' => $item->address, 'ticket_date' => $item->ticket_date]) }}" wire:navigate class="text-green-600 hover:text-green-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->address }}", "{{ $item->ticket_date }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
