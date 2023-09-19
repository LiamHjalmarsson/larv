<div>
    <input 
        {{ 
            $attributes->class("component__input") 
        }}
        id="{{ $name }}"
        type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ old($name) }}"
    />

    <div {{ $attributes->class("component__input__error") }}>
        @error($name)
            {{ $message }}
        @enderror 
    </div>
</div>