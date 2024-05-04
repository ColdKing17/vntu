<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>ПІБ</x-label>
            <x-input wire:model="full_name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Електронна пошта</x-label>
            <x-input wire:model="email" class="block mt-1 w-full" type="email" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Досвід роботи</x-label>
            <x-input wire:model="work_experience" class="block mt-1 w-full" type="number" min="0" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Відділ</x-label>
            <x-select class="mt-1 block w-full" wire:model="department_name" required>
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

        <div class="sm:col-span-3">
            <x-label required>Послуга</x-label>
            <x-select class="mt-1 block w-full" wire:model="service_name" required>
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
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
