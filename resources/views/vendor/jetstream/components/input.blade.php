@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-stone-300 focus:border-stone-300 focus:ring focus:ring-stone-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
