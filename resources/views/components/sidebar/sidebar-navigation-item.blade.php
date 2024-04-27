@props(['routeName', 'text'])

<li>
    <a href="{{ route($routeName.'.index') }}" wire:navigate class="@if(request()->routeIs($routeName.'.*')) bg-gray-50 text-indigo-600 @else text-gray-700 hover:text-indigo-600 hover:bg-gray-50 @endif group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-all pl-[11.5px]">
        <span>{{ $text }}</span>
    </a>
</li>
