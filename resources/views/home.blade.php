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
        <x-sidemenu/>

        <main class="w-3/5">
            <header>
                <h1>Feed</h1>
            </header>
            <section>

            </section>
        </main>
        <aside class="w-1/5">
            <input type="search" name="search" id="search"/>
            <section class="flex flex-col bg-dark-mode-2 rounded-xl">
                <h2>I trend più seguiti</h2>
                <section class="flex gap-6">
                    <ul>
                        <li>#Mondiali2022</li>
                        <li>#F1</li>
                        <li>#GoldenRetriever</li>
                        <li>#SanRemo2023</li>
                        <li>#UniBO</li>
                    </ul>
                    <ul>
                        <li>4.5M</li>
                        <li>3.4M</li>
                        <li>1.2M</li>
                        <li>670k</li>
                        <li>56k</li>
                    </ul>
                </section>
            </section>
        </aside>
    </body>
    <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
</html>