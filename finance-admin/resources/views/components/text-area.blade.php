@props(['name', 'label'])
<label class="form-label">{{ $label }}</label>

<textarea name="{{ $name }}" {{ $attributes }} class="form-control" id="{{ $name }}" rows="4"></textarea>

<span class="text-danger">
    @error( $name )
        {{ $message }}
    @enderror
</span>
