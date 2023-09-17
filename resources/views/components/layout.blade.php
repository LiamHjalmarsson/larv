<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>

        <nav style="padding: 2rem; color: white; display: flex; justify-content: space-between;">
            <div>
                Laravel learning Nav
            </div>
            <ul style="display: flex; justify-content: space-around; width: 30%; color:">
                <li>
                    <a style="color: white" href="{{ route('user.index') }}">
                        Users
                    </a>
                </li>
                <li>
                    @auth
                        <a href="{{ route('user.show', auth()->user()) }}" style="text-decoration: none; color: white;">
                            {{ auth()->user()->username }}
                        </a>
                    @else 
                        <a style="color: white" href="{{ route('user.create') }}">
                            Create user 
                        </a>
                    @endauth
                </li>
            </ul>
        </nav>

        <div class="mainContainer">
            {{ $slot }}
        </div>
    </body>
</html>
