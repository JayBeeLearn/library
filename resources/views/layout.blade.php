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
               <div class="py-2 px-4 sm:px-8 sm:flex justify-between md:px-16">
                    <div>
                        <a href="/" class="text-3xl font-semibold">Open Library</a >
                    </div>

                    <div>
                        <div class="flex space-x-4 justify-center items-center">
                            <a href="" class="block hover:underline">Add Books</a>
                            @guest
                            <a href="" class="block hover:underline">Register</a>
                            @endguest

                            @auth
                                <a href="" class="block hover:underline" >User</a>
                                <a href="" class="block hover:underline" >Log Out</a>
                            @endauth
                        </div>
                    </div>
               </div>
            </nav>

           <div class="py-2 px-4 sm:px-8 sm:flex justify-between md:px-16">
             @yield('content')
           </div>

        </div> 
    </body>
</html>
