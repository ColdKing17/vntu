<x-table title="Клієнти">
    <x-slot:button>
        <a href="{{ route('clients.create') }}" wire:navigate class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Додати клієнта
        </a>
    </x-slot:button>

    <x-slot:filtration>
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

        <div class="inline mr-4">
            <x-label>Комісія</x-label>
            <div class="flex items-center">
                <x-input wire:model.live="min_commission" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
                <span class="mx-2">-</span>
                <x-input wire:model.live="max_commission" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
            </div>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ПІБ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Платіжна система</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Комісія</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->payment_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->commission }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('clients.edit', ['full_name' => $item->full_name, 'transaction_id' => $item->transaction_id, 'payment_name' => $item->payment_name]) }}" wire:navigate class="text-green-600 hover:text-green-900">
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
