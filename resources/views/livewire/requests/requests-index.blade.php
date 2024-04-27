<x-table title="Запити">
    <x-slot:button>
        <a href="{{ route('requests.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати запит
        </a>
    </x-slot:button>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Вимоги</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Бюджет</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Дата</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Тип нерухомості</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ріелтор</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Платіж</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)

            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
