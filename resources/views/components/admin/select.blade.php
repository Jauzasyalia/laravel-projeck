@props(['name', 'label', 'id' => null, 'placeholder' => '-- Pilih --'])

@php
    $id = $id ?? $name;
@endphp

<div>
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" required
        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
        <option value="">{{ $placeholder }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>
