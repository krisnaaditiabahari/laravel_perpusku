@props(['name', 'type' => 'text', 'value' => '', 'readonly' => false])

<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control @error($name) is-invalid @enderror" {{ $readonly ? 'readonly' : '' }}>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
