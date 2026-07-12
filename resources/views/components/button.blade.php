@props(['type' => 'button', 'variant' => 'primary'])

@php
$baseClasses = 'inline-flex justify-center items-center rounded-md border px-4 py-2 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors';

$variantClasses = match ($variant) {
    'primary' => 'border-transparent bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
    'secondary' => 'border-slate-300 bg-white text-slate-700 hover:bg-slate-50 focus:ring-green-500',
    'danger' => 'border-transparent bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    default => 'border-transparent bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
};
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
    {{ $slot }}
</button>
