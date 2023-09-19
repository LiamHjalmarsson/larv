<form 
    action="{{ $action }}" 
    method="POST"
    {{ $attributes->class('component__form') }}
    @if ($enctype !== "undefined") 
        enctype="multipart/form-data" 
    @endif
>
    {{ $slot }}
</form>