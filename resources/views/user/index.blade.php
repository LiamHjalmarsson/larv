<x-layout>
    <h2 style="color: white;">
        All users
    </h2>

    <div style="display: flex; justify-content: space-between; width: 100%;">

        <div>
            Side bar
        </div>

        <div>
            @foreach ($games as $game ) 
                <div>
                    {{ $game->title }}
                </div>
            @endforeach
        </div>

        <div style="">
            @foreach ($users as $user)
                <x-card>
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <h3 style="flex-grow: 1;">
                            {{ $user->username }}
                        </h3>
                        <div style="margin: auto;">
                            <img src="{{ $user->avatar }}" alt="" style="width: 40px; border-radius: 50%;">
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <a href="{{ route('user.show', $user) }}" style="text-decoration: none; color: white; ">
                            Go to user 
                        </a>
                        <p>
                            Freind
                        </p>
                    </div>
                </x-card>
            @endforeach
        </div>

    </div>

</x-layout>