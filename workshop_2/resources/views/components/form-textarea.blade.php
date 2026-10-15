
@props([
    'name',
    'label',
    'value' => '',
    'rows' => 4,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        {{ $attributes->class(['form-control']) }}
    >{{ old($name, $value) }}</textarea>
</div>
