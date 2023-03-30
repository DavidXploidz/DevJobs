@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-100 uppercase font-bold my-2']) }}>
    {{ $value ?? $slot }}
</label>
