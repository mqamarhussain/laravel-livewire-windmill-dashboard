@props(['for', 'label'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'text-sm font-medium']) }}>
    {{ $label }}
</label>
