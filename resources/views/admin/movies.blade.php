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
            <form action="{{ route('auth.logout') }}" method="POST" >
                @csrf
                <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); this.closest('form').submit()" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('auth.logout')</a>
            </form>
            @endauth
        </div>
    </header>
    <main>
        <div class="m-6 mb-12 rounded-xl p-6 shadow-xl sm:p-10">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <h1 class="text-3xl">@lang('dashboard.name')</h1>
                            <div class="p-4 items-center">
                                <form action="{{ route('movies.index') }}" method="GET">
                                    <div class="flex items-center justify-start gap-4">
                                        <div class="mb-2">
                                            <label for="search" class="sr-only">@lang('movies.search')</label>
                                            <div class="relative mt-1">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input type="text" id="search" name="search" value="{{ $filters['search'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang('movies.search_placeholder')">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="year" class="sr-only">@lang('movies.year')</label>
                                            <div class="relative mt-1">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input type="number" id="year" name="year" value="{{ $filters['year'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang('movies.year_placeholder')">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="year_from" class="sr-only">@lang('movies.year_from')</label>
                                            <div class="relative mt-1">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input type="number" id="year_from" name="year_from" value="{{ $filters['year_from'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang('movies.year_from_placeholder')">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="year_to" class="sr-only">@lang('movies.year_to')</label>
                                            <div class="relative mt-1">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input type="number" id="year_to" name="year_to" value="{{ $filters['year_to'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang('movies.year_to_placeholder')">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="genre" class="sr-only">@lang('movies.genre')</label>
                                            <select id="genre" name="genre" class="block w-80 pl-10 p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">@lang('movies.genre_not_selected')</option>
                                                @foreach($genres as $key => $genre)
                                                    <option value="{{ $key }}" @if(isset($filters['genre']) && $filters['genre'] == $key) selected @endif>{{ $genre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('movies.apply_search')</button>
                                    <a href="{{ route('movies.index') }}" class="rounded-md bg-grey-600 py-2 px-4 font-semibold text-black shadow-lg transition duration-150 ease-in-out hover:bg-grey-900 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-grey-500 focus:ring-offset-2">@lang('movies.reset_search')</a>
                                    <a href="{{ route('movies.create') }}" class="rounded-md bg-blue-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-900 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">@lang('movies.create')</a>
                                </form>
                            </div>
                            <table class="min-w-full text-center text-sm font-light">
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                                    <tr>
                                        <th scope="col" class=" px-6 py-4">ID</th>
                                        <th scope="col" class=" px-6 py-4">@lang('movies.title')</th>
                                        <th scope="col" class=" px-6 py-4">@lang('movies.year')</th>
                                        <th scope="col" class=" px-6 py-4">@lang('movies.genre')</th>
                                        <th scope="col" class=" px-6 py-4">@lang('movies.description')</th>
                                        <th scope="col" class=" px-6 py-4">@lang('movies.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                    <tr class="border-b dark:border-neutral-500 {{ !$movie->active ? 'bg-red-100' : '' }}">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $movie->id }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $movie->title }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $movie->year }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $movie->genre->title }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4">{{ $movie->description }}</td>
                                        <td class="whitespace-nowrap  px-6 py-4 flex justify-center items-center gap-4">
                                            <form action="{{ route('movies.publish', $movie) }}" method="POST">
                                                @csrf
                                                <a href="{{ route('movies.publish', $movie) }}" onclick="event.preventDefault(); this.closest('form').submit()" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">@lang('movies.publish')</a>
                                            </form>

                                            <a href="{{ route('movies.edit', $movie) }}" class="rounded-md bg-blue-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">@lang('movies.edit')</a>

                                            <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('movies.destroy', $movie) }}" onclick="event.preventDefault(); this.closest('form').submit()" class="rounded-md bg-red-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">@lang('movies.delete')</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-5">
                            {{ $movies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
