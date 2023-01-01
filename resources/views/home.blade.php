<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Home</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>
    <body class="flex">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen">
            <header class="pt-8 pb-4 w-3/4">
                <h1 class="text-white font-bold font-montserrat text-4xl xl:text-8xl lg:text-8xl md:text-6xl sm:text-6xl">Home 🏠</h1>
            </header>
            <section class="flex flex-col justify-start items-center w-3/4 pb-12
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl overflow-auto">
                @foreach ($feeds as $feed)
                    <x-post-card :post="$feed"
                                 :creator="$creators[$feed['id']][0]"
                                 :images="$images[$feed['id']]"
                                 :videos="$videos[$feed['id']]"
                                 :bookmarked="$bookmarked[$feed['id']]"
                                 :comments="$comments[$feed['id']]"
                                 :tags="$tags[$feed['id']]"
                                 :editable="false" />
                @endforeach
            </section>
        </main>
        <x-top-trends :trends="$trends"/>
        @vite('resources/js/like.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>