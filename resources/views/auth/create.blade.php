<x-layout>
    <x-ui.form action="{{ route('auth.store') }}" method="POST" enctype="false">
        @csrf
        <div class="component__form__div">
            <label for="username">
                Username
            </label>
            <x-ui.input name="username" type="text" />
        </div>

        <div class="component__form__div">
            <label for="password">
                Password
            </label>
            <x-ui.input name="password" type="password" class="authCreate__div__input" />
        </div>

        <div class="component__form__div">
            <x-ui.a_button href="#" class="component__form__div__a">
                Forgout password
            </x-ui.a_button>
        </div>

        <div>
            <div class="component__form__div__div ">
                <x-ui.a_button href="{{ route('user.create') }}" class="component__form__div__div__button ">
                    Create account
                </x-ui.a_button>
                <button class="component__form__div__div__button">
                    Login
                </button>
            </div>
        </div>
    </x-ui.form>
</x-layout>
