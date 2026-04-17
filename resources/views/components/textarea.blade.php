@props([
    'label',
    'name'
])
<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2.5 text-sm font-medium text-heading">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="4"
        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body"
        placeholder="Write your thoughts here...">{{ old($name) }}</textarea>
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>