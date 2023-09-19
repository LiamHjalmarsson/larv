<x-layout>
    <x-form action="{{ route('auth.store') }}" method="POST" enctype="false">
        @csrf
        <div class="component__form__div">
            <label for="username">
                Username
            </label>
            <x-input name="username" type="text" />
        </div>

        <div class="component__form__div">
            <label for="password">
                Password
            </label>
            <x-input name="password" type="password" class="authCreate__div__input" />
        </div>

        <div class="component__form__div">
            <x-a_button href="#" class="component__form__div__a">
                Forgout password
            </x-a_button>
        </div>

        <div>
            <div class="component__form__div__div ">
                <x-a_button href="{{ route('user.create') }}" class="component__form__div__div__button ">
                    Create account
                </x-a_button>
                <button class="component__form__div__div__button">
                    Login
                </button>
            </div>
        </div>
    </x-form>
</x-layout>
