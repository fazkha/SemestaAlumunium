@props([
    'disabled' => false,
    'required' => false,
])

<textarea @disabled($disabled) @required($required)
    {{ $attributes->merge(['class' => 'w-full text-sm rounded-lg shadow-md text-gray-700 placeholder-gray-300 !border-primary-100 !bg-primary-20']) }}>{{ $slot }}</textarea>
