<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>@lang('application.name')</title>
</head>
<body class="min-h-screen bg-gray-50 bg-fixed bg-bottom bg-no-repeat">
    <header class="flex items-center justify-between p-6">
        <a href="{{ route('movies') }}" class="flex items-center gap-2">
            <svg class="h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <span class="text-xl font-black">@lang('application.name')</span>
        </a>
        <div class="flex gap-2 justify-center items-center">
            @guest
            <a href="{{ route('login') }}" class="rounded-md bg-grey-200 py-2 px-4 font-semibold text-gray-900 shadow-lg transition duration-150 ease-in-out hover:bg-grey-500 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-grey-500 focus:ring-offset-2">@lang('auth.login')</a>
            <a href="{{ route('register') }}" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('auth.register')</a>
            @endguest
            @auth
            <a href="{{ route('movies.index') }}" class="rounded-md bg-grey-200 py-2 px-4 font-semibold text-gray-900 shadow-lg transition duration-150 ease-in-out hover:bg-grey-500 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">@lang('dashboard.name')</a>
            <form action="{{ route('auth.logout') }}" method="POST" >
                @csrf
                <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); this.closest('form').submit()" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('auth.logout')</a>
            </form>
            @endauth
        </div>
    </header>
    <main>
        <div class="flex justify-center items-center w-1/4">
{{--            <a href="{{ route('movies') }}" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('movies.link')</a>--}}
        </div>
    </main>
</body>
</html>
