<x-table title="Підписка">
    <x-slot:button>
        <a href="{{ route('subscriptions.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати підписку
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Клієнт</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="client_full_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($clients as $client)
                        <option value="{{ $client->full_name }}">{{ $client->full_name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Валюта</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="currency_symbol">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->symbol }}">{{ $currency->symbol }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Сумма</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Дата</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Спосіб оплати</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Тривалість</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Клієнт</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Валюта</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->amount }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->date }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->payment_method }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->duration }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->client_full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->currency_symbol }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('subscriptions.edit', [$item->date, $item->client_full_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->date }}", "{{ $item->client_full_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
