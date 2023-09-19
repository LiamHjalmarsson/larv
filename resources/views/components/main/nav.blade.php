<nav class="nav">
    <h3>
        Laravel learning
    </h3>
    <ul class="nav__ul">
        <li>
            <a class="nav__ul__li__a" href="{{ route('user.index') }}">
                Users
            </a>
        </li>
    </ul>
    <div class="nav__div">
        @auth
            <a href="{{ route('user.show', auth()->user()) }}" class="nav__ul__li__a">
                {{ auth()->user()->username }}
            </a>
            <form action="{{ route('auth.destroy', auth()->user()->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>
                    Logout
                </button>
            </form>
        @else
            <a class="nav__div__a" href="{{ route('auth.create') }}">
                Login
            </a>
        @endauth
    </div>
</nav>