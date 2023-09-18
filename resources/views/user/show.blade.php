<x-layout>
    <h2 style="color: white">
        {{ $user->username }}
    </h2>


    <div>
        @if(auth()->user()->id == $user->id)
            <a href="{{ route('user.edit', $user) }}">
                Edit your account
            </a>
        @else
            <a href="#">
                Add freind
            </a>
        @endauth
    </div>

</x-layout>