<x-table title="Тікети техпідтримки">
    <x-slot:button>
        <a href="{{ route('tickets.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати тікет техпідтримки
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Працівник</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="worker_full_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($workers as $worker)
                        <option value="{{ $worker->full_name }}">{{ $worker->full_name }}</option>
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
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Дата звернення</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Статус</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Закритий</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Працівник</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Платіжна система</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->date }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->status }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->closed ? 'Так' : 'Ні' }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->worker_full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->payment_name }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('tickets.edit', [$item->date, $item->worker_full_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->date }}", "{{ $item->worker_full_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
