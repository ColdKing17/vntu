<x-table title="Запити">
    <x-slot:button>
        <a href="{{ route('requests.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати запит
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Ріелтор</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="realtor_full_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($realtors as $realtor)
                        <option value="{{ $realtor->full_name }}" wire:key="{{ $realtor->full_name }}">
                            {{ $realtor->full_name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Платіж</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="paymentData">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->date }}, {{ $payment->client_full_name }}" wire:key="{{ $payment->date }}, {{ $payment->client_full_name }}">
                            {{ $payment->date }}, {{ $payment->client_full_name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

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
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->requirements }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->budget }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->date }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->property_type }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->realtor_full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    @if($item->payment_date)
                        {{ $item->payment_date }}, {{ $item->client_full_name }}
                    @endif
                </td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('requests.edit', ['requirements' => $item->requirements, 'realtorFullName' => $item->realtor_full_name, 'paymentDate' => $item->payment_date, 'clientFullName' => $item->client_full_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->requirements }}", "{{ $item->realtor_full_name }}", "{{ $item->payment_date }}", "{{ $item->client_full_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
