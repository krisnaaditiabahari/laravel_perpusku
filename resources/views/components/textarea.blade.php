@props(['name', 'value' => ''])

<textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}">{{ old($name, $value) }}</textarea>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
