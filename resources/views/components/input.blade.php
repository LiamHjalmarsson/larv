<div>
    <input 
        style="width: 100%"
        id="{{ $name }}"
        type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ old($name) }}"
    />

    @error($name)
        {{ $message }}
    @enderror 
</div>