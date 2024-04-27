<x-table title="Відділи">
    <x-slot:button>
        <a href="{{ route('departments.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати відділ
        </a>
    </x-slot:button>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Назва</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Адреса офісу</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Номер телефону</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Вулиця</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Рекламна кампанія</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)

            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
