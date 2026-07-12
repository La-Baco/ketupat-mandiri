@props(['name', 'label', 'required' => false, 'accept' => 'image/*', 'currentImage' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
    </label>
    
    @if($currentImage)
        <div class="mb-2">
            <img src="{{ Storage::url($currentImage) }}" alt="Current {{ $label }}" class="h-32 object-cover rounded-md border border-slate-200">
        </div>
    @endif
    
    <input 
        type="file" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        accept="{{ $accept }}"
        {{ $required && !$currentImage ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100']) }}
    >
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
