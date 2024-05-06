<x-table title="Клієнти">
    <x-slot:button>
        <a href="{{ route('clients.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати клієнта
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Транзакція</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="transaction_id">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($transactions as $transaction)
                        <option value="{{ $transaction->transaction_id }}">{{ $transaction->transaction_id }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Платіжна система</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="payment_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->name }}">{{ $payment->name }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ПІБ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Номер телефону</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Дата народження</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Транзакція</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Платіжна система</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->phone }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->date_of_birth }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->transaction_id }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->payment_name }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('clients.edit', ['full_name' => $item->full_name, 'transaction_id' => $item->transaction_id, 'payment_name' => $item->payment_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->full_name }}", "{{ $item->transaction_id }}", "{{ $item->payment_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
