<x-table title="ТРЦ">
    <x-slot:button>
        <a href="{{ route('malls.create') }}" wire:navigate class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Додати ТРЦ
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Адреса</x-label>
            <x-input wire:model.live="address" class="block mt-1 w-full" type="text" />
        </div>

        <div class="inline mr-4">
            <x-label>Район</x-label>
            <x-input wire:model.live="district" class="block mt-1 w-full" type="text" />
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Адреса</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Площа</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Поверховість</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Район</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->address }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->square }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->superficiality }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->district }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('malls.edit', $item->address) }}" wire:navigate class="text-green-600 hover:text-green-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->address }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
