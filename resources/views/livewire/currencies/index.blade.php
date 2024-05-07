<x-table title="Валюти">
    <x-slot:button>
        <a href="{{ route('currencies.create') }}" wire:navigate class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Додати валюту
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Назва</x-label>
            <x-input wire:model.live="name" class="block mt-1 w-full" type="text" />
        </div>

        <div class="inline mr-4">
            <x-label>Символ</x-label>
            <x-input wire:model.live="symbol" class="block mt-1 w-full" type="text" />
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Символ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Актуальний курс</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Остання зміна курсу</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->symbol }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->rate }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->rate_changed }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('currencies.edit', $item->symbol) }}" wire:navigate class="text-green-600 hover:text-green-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->symbol }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
