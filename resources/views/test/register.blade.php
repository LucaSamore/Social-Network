<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Register</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-[url('../../public/svg/layered-waves.svg')] bg-cover">
        <main class="flex flex-col justify-evenly gap-6 items-center min-h-screen">
            <header>
                <h1 class="text-white font-bold font-lobster text-8xl p-4">Crea account</h1>
            </header>
            <section 
                class="flex flex-col gap-6 items-center bg-dark-mode-3 rounded-xl py-12 w-3/5 xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 mb-8">
                <form action="/register" method="post" enctype="multipart/form-data" class="flex flex-col xl:flex-col lg:flex-col md:flex-col sm:flex-col gap-4 w-full justify-evenly items-center">
                    @csrf
                    <fieldset class="w-1/2 px-6">
                        <legend class="mb-8 text-white font-bold font-montserrat text-xl xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl">Profilo</legend>
                        <fieldset class="flex gap-4 justify-center items-center">
                            <div class="flex flex-col w-3/4 gap-4">
                                <fieldset class="flex flex-col gap-2">
                                    <label for="username" class="text-white font-quicksand font-bold text-lg">Username:</label>
                                    <input type="text" id="username" name="username" required minlength="5" maxlength="25" placeholder="Username"
                                        class="input h-10 w-full rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                </fieldset>
                                <fieldset class="flex flex-col gap-2">
                                    <label for="bio" class="text-white font-quicksand font-bold text-lg">Biografia:</label>
                                    <textarea id="bio" name="bio" placeholder="Bio"
                                        class="textarea h-28 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"></textarea>
                                </fieldset>
                            </div>
                            <div class="flex flex-col w-1/4">

                            </div>
                        </fieldset>

                    </fieldset>
                    <div class="divider"></div> 
                    <fieldset class="w-1/2 px-6">
                        <legend class="w-full mb-8 text-white font-bold font-montserrat text-xl xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl">Dati personali</legend>
                        <fieldset class="grid gap-y-6 gap-x-10 grid-col-1 grid-rows-6 xl:grid-col-2 xl:grid-rows-3 lg:grid-col-1 lg:grid-rows-6 md:grid-col-1 md:grid-rows-6 sm:grid-col-1 sm:grid-rows-6 grid-flow-col">
                            <fieldset class="flex flex-col gap-2">
                                <label for="name" class="text-white font-quicksand font-bold text-lg">Nome:</label>
                                <input type="text" id="name" name="name" required minlength="5" maxlength="50" placeholder="Nome"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="surname" class="text-white font-quicksand font-bold text-lg">Cognome:</label>
                                <input type="text" id="surname" name="surname" required minlength="5" maxlength="50" placeholder="Cognome"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="date_of_birth" class="text-white font-quicksand font-bold text-lg">Data di nascita:</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" required
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="email" class="text-white font-quicksand font-bold text-lg">Email:</label>
                                <input type="email" id="email" name="email" required minlength="5" maxlength="50" placeholder="Email"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="password" class="text-white font-quicksand font-bold text-lg">Password:</label>
                                <input type="password" id="password" name="password" required minlength="8" maxlength="50" placeholder="●●●●●●●●"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="password_confirmation" class="text-white font-quicksand font-bold text-lg w-full">Conferma password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" maxlength="50" placeholder="●●●●●●●●"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                            </fieldset>
                        </fieldset>
                    </fieldset>
                    <input type="submit" value="Crea" class="btn border-none px-16 hover:bg-lavanda text-white font-bold font-montserrat text-lg bg-lavanda rounded-lg py-1 mt-6 normal-case"/>
                </form>
                <footer class="flex justify-around gap-4 items-center mt-4 xl:flex-row lg:flex-col md:flex-col sm:flex-col flex-col">
                    <p class="text-white font-quicksand text-sm">Hai già un account?</p>
                    <a href="/login" class="text-white font-bold font-quicksand text-sm hover:underline">Accedi</a>
                </footer>
            </section>
        </main>
    </body>
</html>