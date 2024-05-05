<x-table title="Ріелтори">
    <x-slot:button>
        <a href="{{ route('realtors.create') }}" wire:navigate class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Додати ріелтора
        </a>
    </x-slot:button>

    <x-slot:filtration>
        <div class="inline mr-4">
            <x-label>Відділ</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="department_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($departments as $department)
                        <option value="{{ $department->name }}" wire:key="{{ $department->name }}">
                            {{ $department->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>

        <div class="inline mr-4">
            <x-label>Послуга</x-label>
            <x-select class="mt-1 block w-full" wire:model.live="service_name">
                <x-slot name="options">
                    <option value=""></option>
                    @foreach($services as $service)
                        <option value="{{ $service->name }}" wire:key="{{ $service->name }}">
                            {{ $service->name }}
                        </option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
    </x-slot:filtration>

    <x-slot:thead>
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ПІБ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Електронна пошта</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Досвід роботи</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Відділ</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Послуга</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"></th>
        </tr>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($items as $item)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $item->full_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->email }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->work_experience }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->department_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->service_name }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ route('realtors.edit', [$item->full_name, $item->department_name, $item->service_name]) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                        Змінити
                    </a>
                    <button wire:click='delete("{{ $item->full_name }}", "{{ $item->department_name }}", "{{ $item->service_name }}")' class="ml-2 text-red-600 hover:text-red-900">
                        Видалити
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>
</x-table>
