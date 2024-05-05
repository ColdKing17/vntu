<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ $title }}</h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            {{ $button }}
        </div>
    </div>

    <div class="mt-8 flex">
        {{ $filtration }}
    </div>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        {{ $thead }}
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{ $tbody }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
