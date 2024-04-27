<x-table title="Рекламні кампанії">
    <x-slot:button>
        <a href="{{ route('advertising-campaigns.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати рекламну кампанію
        </a>
    </x-slot:button>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Бюджет</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Дата</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Цільова аудиторія</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Конверсія</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->budget }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->date }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->target_audience }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->conversion }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('streets.edit', $item->name) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
