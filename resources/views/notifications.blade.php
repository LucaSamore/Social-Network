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
    <body class="flex overflow-hidden">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen overflow-auto">
            <header class="pt-8 pb-4 w-3/4 flex flex-col gap-4 justify-center items-center">
                <h1 class="text-white text-center font-bold font-montserrat text-4xl xl:text-8xl lg:text-8xl md:text-6xl sm:text-6xl">Notifiche 🔔</h1>
            </header>
            <section id="feeds" class="flex flex-col justify-start items-center w-3/4 pb-12
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl">
                @forelse ($notifications as $noti)
                    <x-notification :notification="$noti" />
                @empty
                    <h2>Non ci sono notifiche</h2>
                @endforelse
            </section>
        </main>
        <x-top-trends :trends="$trends"/>
        @vite('resources/js/refresh.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>