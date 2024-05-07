@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 p-1.5 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm']) !!}>
    {{ $options }}
</select>
