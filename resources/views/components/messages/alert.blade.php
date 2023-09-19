<div style="width: 100%; display: flex; justify-content: center;">
    @if (session()->has('success'))
        <div style="width: 50%; text-align: center; margin-bottom: 1rem; padding: 1rem; background-color: rgba(170, 214, 216, 0.556); border-radius: 0.5rem;">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div style="width: 50%; text-align: center; margin-bottom: 1rem; padding: 1rem; background-color: rgba(170, 214, 216, 0.556);">
            {{ session('error') }}
        </div>
    @endif
</div>