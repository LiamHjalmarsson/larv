<x-layout>
    <x-form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="component__form__div">
            <label for="name">
                Name
            </label>
            <x-input name="name" type="text" />   
        </div>

        <div class="component__form__div">
            <label for="username">
                Username
            </label>
            <x-input name="username" type="text" />   
        </div>

        <div class="component__form__div">
            <label for="email">
                Email
            </label>
            <x-input name="email" type="email" />   
        </div>
        
        <div class="component__form__div">
            <label for="password">
                Password
            </label>
            <x-input name="password" type="password" />   
        </div>
        
        <div class="component__form__div">
            <label for="avatar">
                Avatar
            </label>
            <x-input name="avatar" type="file" />   
        </div>

        <div class="component__form__div__div">
            <x-a_button href="{{ route('auth.create') }}" class="component__form__div__div__button">
                Login
            </x-a_button>
            <button class="component__form__div__div__button">
                Create user
            </button>
        </div>
    </x-form>
</x-layout>