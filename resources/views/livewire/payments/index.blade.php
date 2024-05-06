<x-table title="Платіжні системи">
    <x-slot:button>
        <a href="{{ route('payments.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати платіжну систему
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Комісія</x-label>
            <div class="flex items-center">
                <x-input wire:model.live="min_commission" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
                <span class="mx-2">-</span>
                <x-input wire:model.live="max_commission" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
            </div>
        </div>

        <div class="inline mr-4">
            <x-label>Термінал</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="terminal_internal_number">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($terminals as $terminal)
                        <option value="{{ $terminal->internal_number }}">{{ $terminal->internal_number }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Підтримувана валюта</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Рівень безпеки та захисту даних</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Максимальна сума та обмеження транзакцій</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Комісія</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Термінал</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->supported_currency_symbol }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->security_level }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->max_sum }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->commission }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->terminal_internal_number }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('payments.edit', [$item->name, $item->terminal_internal_number]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->name }}", "{{ $item->terminal_internal_number }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
