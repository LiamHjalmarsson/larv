<x-layout>

    <x-card style="width: 50%; margin-bottom: 1rem;">
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h2>
                    {{ $user->username }}
                </h2>
                <img src="{{ $user->avatar }}" style="height: 50px; border-radius: 50%;"/>
            </div>

            <div style="text-align: center">
                @if(auth()->user()->id == $user->id)
                    <x-a_button href="{{ route('user.edit', $user) }}">
                        Edit your account
                    </x-a_button>
                @else
                    <a href="#">
                        Add freind
                    </a>
                @endauth
            </div>
            
            <div>
                <h4>
                    Details
                </h4>
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        Country: {{ $user->country }}
                    </div>
                    <div>
                        City: {{ $user->city }}
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <x-card style="width: 50%;">
        <h2 style="text-align: center">
            Posts
        </h2>
    </x-card>


</x-layout>