<x-layout>
    <h2 style="color: white;">
        Create User
    </h2>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1rem; background: #9f7a7a; padding: 1rem; width: 40%;">
        @csrf

        <div style="display: flex; flex-direction: column;">
            <label for="name">
                Name
            </label>
            <x-input name="name" type="text" />   
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="username">
                Username
            </label>
            <x-input name="username" type="text" />   
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="email">
                Email
            </label>
            <x-input name="email" type="email" />   
        </div>
        
        <div style="display: flex; flex-direction: column;">
            <label for="password">
                Password
            </label>
            <x-input name="password" type="password" />   
        </div>
        
        <div style="display: flex; flex-direction: column;">
            <label for="avatar">
                Avatar
            </label>
            <x-input name="avatar" type="file" />   
        </div>

        <div>
            <button>
                Create user
            </button>
        </div>
    </form>
</x-layout>