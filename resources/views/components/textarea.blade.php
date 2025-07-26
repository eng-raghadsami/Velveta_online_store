@props([
    'label' => '',
    'name',
    'value' => '',
    'rows' => 4,
    'required' => false,
    'placeholder' => '',
    'readonly' => false,
])

<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}:</label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }}
        {{ $attributes->merge(['class' => 'form-control']) }}
    >{{ old($name, $value) }}</textarea>

@error($name)
  <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>
