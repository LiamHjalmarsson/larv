<x-layout>
    <x-ui.form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="component__form__div">
            <label for="name">
                Name
            </label>
            <x-ui.input name="name" type="text" value="{{ $user->name }}" />   
        </div>

        <div class="component__form__div">
            <label for="username">
                Username
            </label>
            <x-ui.input name="username" type="text" value="{{ $user->username }}" />   
        </div>

        <div class="component__form__div">
            <label for="email">
                Email
            </label>
            <x-ui.input name="email" type="email" value="{{ $user->email }}" />   
        </div>
        
        <div class="component__form__div">
            <label for="avatar">
                Avatar
            </label>
            <x-ui.input name="avatar" type="file" value="{{ $user->avatar }}"/>   
        </div>

        <div class="OtherDetailsContainer">
            <div id="OtherUserDetails">
                Other details
            </div>
            <div class="OtherDetailsContainer__div">
                <div>
                    <label for="country">
                        Country
                    </label>
                    <x-ui.input name="country" type="text" value="{{ $user->country }}"/>   
                </div>
        
                <div>
                    <label for="city">
                        City
                    </label>
                    <x-ui.input name="city" type="text" value="{{ $user->city }}"/>   
                </div>
            </div>
        </div>

        <div>
            <div class="component__form__div__div"> 
                <button class="component__form__div__div__button">
                    Canel
                </button>
                <button class="component__form__div__div__button">
                    Update
                </button>
            </div>
        </div>
    </x-ui.form>

    <form action="{{ route('user.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')

        <button class="component__form__div__div__button">
            Delete account
        </button>
    </form>

</x-layout>