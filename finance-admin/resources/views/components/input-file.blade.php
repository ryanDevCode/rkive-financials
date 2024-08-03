@props(['name', 'label'])

<label class="form-label">{{ $label }}</label>

<input type="file" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}
    id="{{ $name }}" />

<span class="text-danger">
    @error($name)
        {{ $message }}
    @enderror
</span>
