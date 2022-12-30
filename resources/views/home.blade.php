<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Home</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body class="flex">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen">
            <header class="pt-8 pb-4 w-3/4">
                <h1 class="text-white font-bold font-montserrat text-4xl xl:text-8xl lg:text-8xl md:text-6xl sm:text-6xl">Home 🏠</h1>
            </header>
            <section class="flex flex-col justify-start items-center w-3/4
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl overflow-auto">
                <x-post-card/>
                <x-post-card/>
                <x-post-card/>
            </section>
        </main>
        <x-top-trends :trends="$trends"/>
    </body>
    <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
</html>