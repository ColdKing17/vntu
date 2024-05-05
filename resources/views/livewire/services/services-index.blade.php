<x-table title="Послуги">
    <x-slot:button>
        <a href="{{ route('services.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати послугу
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Ціна</x-label>
            <div class="flex items-center">
                <x-input wire:model.live="min_price" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
                <span class="mx-2">-</span>
                <x-input wire:model.live="max_price" class="block mt-1 w-full min-w-20" type="number" min="0" max="0.01" />
            </div>
        </div>

        <div class="inline mr-4">
            <x-label>Термін виконання</x-label>
            <x-input wire:model.live="term_of_provision" class="block mt-1 w-full" type="text" />
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Опис</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ціна</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Термін виконання</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->description }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->price }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->term_of_provision }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('services.edit', $item->name) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
