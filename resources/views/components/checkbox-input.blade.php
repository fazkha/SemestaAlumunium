@props([
    'disabled' => false,
    'required' => false,
])

<input type="checkbox" @disabled($disabled) @required($required) {{ $checked ?? '' }}
    {{ $attributes->merge(['class' => 'w-6 h-6 block text-md rounded-sm shadow-md text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2']) }} />
