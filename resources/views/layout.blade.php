<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite('resources/css/app.css')
    
    </head>
    <body class="">
        <div class="main ">
            <nav class="text-white  bg-green-500  ">
               <div class="py-2 px-4 sm:px-8 flex justify-between md:px-16">
                    <div>
                        <a href="/" class="text-2xl sm:text-3xl font-semibold">Open Library</a >
                    </div>

                    <div>
                        <div class="flex justify-between items-center ">
                            <div class="flex  space-x-4">
                                <a href="{{ route('addNewBook') }}" class="block hover:underline">Add Books</a>
                                <a href="{{ route('authors.index') }}" class="block hover:underline">Authors </a>
                                @guest
                                <a href="{{ route('register') }}" class="block hover:underline">Register</a>
                                <a href="{{ route('login') }}" class="block hover:underline">Login</a>
                                @endguest

                                @auth
                                    <a href="" class="block hover:underline" >{{ auth()->user()->name }}</a>
                                    <form action="{{ route('logout') }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{ auth()->user()->id }}">

                                        <input type="submit" class="cursor-pointer hover:underline" value="Log Out">
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
               </div>
            </nav>
            <div class="flex place-items-end relative min-h-4 my-2 mx-4 sm:mx-8 md:mx-16">
                <form 
                    action="{{ route('query') }}"
                    method="POST"
                    class="border-2 flex justify-between border-green-700 rounded-md  absolute top-0 right-0 sm:w-2/5 md:w-2/6" >

                    @csrf
                    <input type="text" name="query" class=" outline-none bg-transparent py-1 px-4 placeholder:text-sm" placeholder="Locate books and authors ..." required oninvalid="this.setCustomValidity('Search term is required')" oninput="this.setCustomValidity('')">
                    <button class="bg-green-700 py-1 px-6 text-white rounded-r" type="submit">S   </button>
                </form>
            </div>

           <div class="py-2 px-4 sm:px-8  justify-between md:px-16">
             @yield('content')
           </div>

        </div> 
    </body>
</html>
