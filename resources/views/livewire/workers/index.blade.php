<x-table title="Працівники">
    <x-slot:button>
        <a href="{{ route('workers.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати працівника
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Офіс</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="office_address">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($offices as $office)
                        <option value="{{ $office->address }}">{{ $office->address }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Кабінет</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="cabinet_number">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($cabinets as $cabinet)
                        <option value="{{ $cabinet->number }}">{{ $cabinet->number }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ПІБ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Внутрішній номер</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Електронна пошта</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Стаж</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Офіс</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Кабінет</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->internal_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->email }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->experience }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->cabinet_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->office_address }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('workers.edit', [$item->full_name, $item->cabinet_number, $item->office_address]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->full_name }}", "{{ $item->cabinet_number }}", "{{ $item->office_address }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
