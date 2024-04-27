<x-table title="Нерухомості">
    <x-slot:button>
        <a href="{{ route('real-estates.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати нерухомість
        </a>
    </x-slot:button>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Адреса</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Тип</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ціна</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ЖК</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Район</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)

            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
