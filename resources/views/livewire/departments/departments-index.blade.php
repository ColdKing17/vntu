<x-table title="Відділи">
    <x-slot:button>
        <a href="{{ route('departments.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати відділ
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Вулиця</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="street_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($streets as $street)
                        <option value="{{ $street->name }}" wire:key="{{ $street->name }}">
                            {{ $street->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Рекламна кампанія</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="advertising_campaign_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($advertisingCampaigns as $advertisingCampaign)
                        <option value="{{ $advertisingCampaign->name }}" wire:key="{{ $advertisingCampaign->name }}">
                            {{ $advertisingCampaign->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

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
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->office_address }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->phone_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->street_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->advertising_campaign_name }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('departments.edit', [$item->name, $item->advertising_campaign_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->name }}", "{{ $item->advertising_campaign_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
