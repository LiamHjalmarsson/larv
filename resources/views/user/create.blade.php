<x-layout>
    <x-ui.form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="component__form__div">
            <label for="name">
                Name
            </label>
            <x-ui.input name="name" type="text" />   
        </div>

        <div class="component__form__div">
            <label for="username">
                Username
            </label>
            <x-ui.input name="username" type="text" />   
        </div>

        <div class="component__form__div">
            <label for="email">
                Email
            </label>
            <x-ui.input name="email" type="email" />   
        </div>
        
        <div class="component__form__div">
            <label for="password">
                Password
            </label>
            <x-ui.input name="password" type="password" />   
        </div>
        
        <div class="component__form__div">
            <label for="avatar">
                Avatar
            </label>
            <x-ui.input name="avatar" type="file" />   
        </div>

        <div class="component__form__div__div">
            <x-ui.a_button href="{{ route('auth.create') }}" class="component__form__div__div__button">
                Login
            </x-ui.a_button>
            <button class="component__form__div__div__button">
                Create user
            </button>
        </div>
    </x-ui.form>
</x-layout>