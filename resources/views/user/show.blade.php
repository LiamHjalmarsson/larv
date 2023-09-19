<x-layout>

    <x-cards.card style="width: 50%; margin-bottom: 1rem;">
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h2>
                    {{ $user->username }}
                </h2>
                <img src="{{ $user->avatar }}" style="height: 50px; border-radius: 50%;"/>
            </div>

            <div style="text-align: end; margin-bottom: 2rem;">
                @if(auth()->user()->id == $user->id)
                    <x-a_button href="{{ route('user.edit', $user) }}">
                        Edit your account
                    </x-a_button>
                @else
                    @if (!$following AND auth()->user()->username != $user->username)
                        <form action="/user/{{ $user->username }}/follow" method="POST">
                            @csrf
                            <button class="component__form__div__div__button">
                                Follow
                            </button>
                        </form>
                    @endif
                    @if ($following)
                        <form action="/user/{{ $user->username }}/unfollow" method="POST">
                            @csrf
                            <button class="component__form__div__div__button">
                                Stop Following
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <h3>
                    Details
                </h3>
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        Country: {{ $user->country }}
                    </div>
                    <div>
                        City: {{ $user->city }}
                    </div>
                </div>
                <div>
                    Description
                </div>
            </div>
        </div>
    </x-cards.card>

    <x-cards.card style="width: 50%;">
        <h2 style="text-align: center">
            Posts
        </h2>
    </x-cards.card>


</x-layout>