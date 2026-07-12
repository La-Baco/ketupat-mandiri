@props(['name', 'label', 'options' => [], 'value' => '', 'required' => false])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700 mb-1">
        {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
    </label>
    <select 
        name="{{ $name }}" 
        id="{{ $name }}" 
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm']) }}
    >
        <option value="">-- Pilih {{ $label }} --</option>
        @foreach($options as $key => $text)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
