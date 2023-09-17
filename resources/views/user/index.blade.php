<x-layout>
    <div>
        <h2 style="color: white;">
            All users
        </h2>
    </div>

    <div class="userContainer">
        @foreach ($users as $user)
            <x-card>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: margin-bottom: 0.5rem;">
                    <h3>
                        {{ $user->username }}
                    </h3>
                    <div>
                        <img src="{{ $user->avatar }}" alt="" style="width: 50px;">
                    </div>
                </div>
                <div>
                    <a href="{{ route('user.show', $user) }}">
                        go to user 
                    </a>
                </div>
            </x-card>
        @endforeach
    </div>

</x-layout>