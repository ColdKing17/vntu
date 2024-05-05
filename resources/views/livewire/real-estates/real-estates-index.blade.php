<x-table title="Нерухомості">
    <x-slot:button>
        <a href="{{ route('real-estates.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати нерухомість
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>ЖК</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="residential_complex_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($residentialComplexes as $residentialComplex)
                        <option value="{{ $residentialComplex->name }}" wire:key="{{ $residentialComplex->name }}">
                            {{ $residentialComplex->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Район</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="district_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($districts as $district)
                        <option value="{{ $district->name }}" wire:key="{{ $district->name }}">
                            {{ $district->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

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
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->address }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->type }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->price }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->residential_complex_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->district_name }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('real-estates.edit', $item->address) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
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
