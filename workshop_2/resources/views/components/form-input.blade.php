
@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'min' => null,
    'step' => null,
])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span class="required">*</span>
        @endif
    </label>

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif
        @if ($min !== null) min="{{ $min }}" @endif
        @if ($step !== null) step="{{ $step }}" @endif
        {{ $attributes->class(['form-control']) }}
    >
</div>
