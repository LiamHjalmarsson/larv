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

        <div style="width: 30%;display: flex;/*! justify-content: center; */align-items: center;flex-direction: column;">
            @foreach ($users as $user)
                <x-card class="card__box">
                    <div class="card__box__user">
                        <h3 class="card__box__user__h3">
                            {{ $user->username }}
                        </h3>
                        <div class="card__box__wrapper">
                            <img src="{{ $user->avatar }}" alt="" class="card__box__wrapper__img">
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