@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 p-1.5 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    {{ $options }}
</select>
