@props([
    'for',
    'type' => 'text',
    'value' => ''
])
<div class="rounded-md shadow-sm">
    <input
        type="{{ $type }}"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'bg-white border border-gray-200 py-2 px-3 rounded-lg w-full block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
        id="{{ $for }}"
        />
    
        @error($for)
        <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
</div>



