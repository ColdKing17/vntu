<x-table title="Транзакції">
    <x-slot:button>
        <a href="{{ route('transactions.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати транзакцію
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Категорія</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="category_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Підписка</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="subscription_date">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($subscriptions as $subscription)
                        <option value="{{ $subscription->date }}">{{ $subscription->date }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Номер транзакції</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Номер карти</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Отримувач</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Категорія</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Підписка</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->transaction_id }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->card_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->receiver }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->category_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->subscription_date }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('transactions.edit', [$item->transaction_id, $item->receiver]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->transaction_id }}", "{{ $item->receiver }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
