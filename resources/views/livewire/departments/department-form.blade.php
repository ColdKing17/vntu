<form wire:submit="save">
    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <x-label required>Назва</x-label>
            <x-input wire:model="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Адреса офісу</x-label>
            <x-input wire:model="office_address" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Номер телефону</x-label>
            <x-input wire:model="phone_number" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="sm:col-span-3">
            <x-label required>Вулиця</x-label>
            <x-select class="mt-1 block w-full" wire:model="street_name" required>
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

        <div class="sm:col-span-3">
            <x-label required>Рекламна кампанія</x-label>
            <x-select class="mt-1 block w-full" wire:model="advertising_campaign_name" required>
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
    </div>

    <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
        Зберегти
    </button>
</form>
