@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
    'readonly' => false,
    'class' => '',
])

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $readonly ? 'readonly' : '' }}
        {{ $required ? 'required' : '' }}
        class="form-control {{ $class }} @error($name) is-invalid @enderror"
        {{ $attributes }}
    />

    @error($name)
    <div class="error-msg">{{ $message }}</div>
@enderror


    @if ($type === 'file' && $value)
        <img width="150" class="img-thumbnail mt-2" src="{{ asset($value) }}" alt="">
    @endif
</div>
