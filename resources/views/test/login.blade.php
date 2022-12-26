<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Login</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-[url('../../public/svg/layered-waves.svg')] bg-cover">
        <main class="flex flex-col justify-evenly gap-6 items-center min-h-screen">
            <header>
                <h1 class="text-white font-bold font-lobster text-8xl">Social App</h1>
            </header>

            <section class="flex flex-col gap-6 justify-around items-center bg-dark-mode-3 rounded-xl py-8 w-3/4 xl:w-1/5 lg:w-1/3 md:w-1/2 sm:w-1/2">
                <h2 class="text-white font-bold text-2xl xl:text-2xl lg:text-2xl md:text-2xl sm:text-2xl font-quicksand">Login</h2>
                @error('error')
                    <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                @enderror
                <form action="/login" method="post" class="flex flex-col gap-4 w-3/4">
                    @csrf

                    <label for="email" class="text-white font-quicksand font-bold text-sm">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="test@gmail.com" minlength="5" maxlength="50"
                        class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                    @error('email')
                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                    @enderror
                
                    <label for="password" class="text-white font-quicksand font-bold text-sm">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="●●●●●●●●" minlength="8" maxlength="50"
                        class="input h-10 rounded-lg py-1 bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500 focus:border-2 focus:border-gray-500"/>
                    @error('password')
                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                    @enderror
                    
                    <input type="submit" value="Accedi" class="btn border-none hover:bg-lavanda text-white font-bold font-montserrat text-lg bg-lavanda rounded-lg py-1 mt-6 normal-case"/>
                </form>
                <footer class="flex justify-around gap-4 items-center mt-4 xl:flex-row lg:flex-col md:flex-col sm:flex-col flex-col">
                    <p class="text-white font-quicksand text-sm">Non hai un account?</p>
                    <a href="/register" class="text-white font-bold font-quicksand text-sm hover:underline">Registrati</a>
                </footer>
            </section>
        </main>
    </body>
</html>