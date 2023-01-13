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
                <h1 class="text-white font-bold font-lobster text-6xl xl:text-8xl lg:text-8xl md:text-8xl sm:text-6xl p-4">Crea account</h1>
            </header>
            <section 
                class="flex flex-col gap-6 items-center bg-dark-mode-3 rounded-xl py-12 w-3/5 xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 mb-8">
                @if(Session::has('error'))
                    <span class="text-red-600 font-montserrat font-bold text-lg xl:text-2xl lg:text-2xl md:text-xl sm:text-lg mt-4">
                        {{ Session::get('error') }}
                    </span>
                    @php
                        Session::forget('error');
                    @endphp
                @endif
                <form action="/register" method="post" enctype="multipart/form-data" 
                    class="flex flex-col xl:flex-col lg:flex-col md:flex-col sm:flex-col gap-4 w-full justify-evenly items-center">
                    @csrf
                    <fieldset class="w-full xl:w-3/4 lg:w-full md:w-full sm:w-full px-6">
                        <legend class="mb-8 text-white font-bold font-montserrat text-xl xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl">Profilo</legend>
                        <fieldset class="flex flex-col xl:flex-row lg:flex-col md:flex-col sm:flex-col gap-10 justify-center items-center">
                            <div class="flex flex-col gap-4 w-full xl:w-1/2 lg:w-1/2 md:w-full sm:w-full">
                                <fieldset class="flex flex-col gap-2">
                                    <label for="username" class="text-white font-quicksand font-bold text-lg">Username:</label>
                                    <input type="text" id="username" value="{{ old('username') }}" name="username" required minlength="5" maxlength="25" placeholder="Username"
                                        class="input h-10 w-full rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                        @error('username')
                                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                        @enderror
                                </fieldset>
                                <fieldset class="flex flex-col gap-2">
                                    <label for="bio" class="text-white font-quicksand font-bold text-lg">Biografia:</label>
                                    <textarea id="bio" name="bio" placeholder="Bio" value="{{ old('bio') }}"
                                        class="textarea h-28 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"></textarea>
                                </fieldset>
                            </div>
                            <div class="flex flex-col gap-2 xl:items-end lg:items-center md:items-center sm:items-center items-center w-full xl:w-1/2 lg:w-1/2 md:w-full sm:w-full">
                                <img src="{{asset('img/default-avatar.png')}}" id="preview" alt="preview profile image" width="128" height="128" 
                                    class="w-32 h-32 mb-6 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-4 border-gray-500" />
                                <label for="input-preview" class="text-white font-quicksand text-xl font-bold">Immagine profilo:</label>
                                <input type="file" id="input-preview" name="profile_image" value="{{ old('profile_image') }}" accept=".png, .jpg, .jpeg" 
                                    class="text-white font-quicksand w-3/4 mt-6 border-2 border-gray-400 rounded-lg" />
                                <button id="delete-preview" class="px-4 py-2 mt-4 text-white font-bold font-quicksand rounded-md bg-red-500 hover:bg-red-700 invisible">Elimina</button>
                                @error('profile_image')
                                    <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                    </fieldset>
                    <div class="divider"></div> 
                    <fieldset class="w-3/4 px-6">
                        <legend class="w-full mb-8 text-white font-bold font-montserrat text-xl xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl">Dati personali</legend>
                        <fieldset class="grid gap-y-6 gap-x-10 grid-col-1 grid-rows-6 xl:grid-col-2 xl:grid-rows-3 lg:grid-col-1 lg:grid-rows-6 md:grid-col-1 md:grid-rows-6 sm:grid-col-1 sm:grid-rows-6 grid-flow-col">
                            <fieldset class="flex flex-col gap-2">
                                <label for="name" class="text-white font-quicksand font-bold text-lg">Nome:</label>
                                <input type="text" id="name" name="name" required minlength="1" maxlength="50" placeholder="Nome" value="{{ old('name') }}"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('name')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="surname" class="text-white font-quicksand font-bold text-lg">Cognome:</label>
                                <input type="text" id="surname" name="surname" required minlength="1" maxlength="50" placeholder="Cognome" value="{{ old('surname') }}"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('surname')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="date_of_birth" class="text-white font-quicksand font-bold text-lg">Data di nascita:</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" required value="{{ old('date_of_birth') }}"
                                    class="h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('date_of_birth')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="email" class="text-white font-quicksand font-bold text-lg">Email:</label>
                                <input type="email" id="email" name="email" required minlength="5" maxlength="50" placeholder="Email" value="{{ old('email') }}"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('email')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="password" class="text-white font-quicksand font-bold text-lg">Password:</label>
                                <input type="password" id="password" name="password" required minlength="8" maxlength="50" placeholder="●●●●●●●●"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('password')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                            <fieldset class="flex flex-col gap-2">
                                <label for="password_confirmation" class="text-white font-quicksand font-bold text-lg w-full">Conferma password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" maxlength="50" placeholder="●●●●●●●●"
                                    class="input h-10 rounded-lg bg-white text-sm font-bold font-quicksand text-black px-2 border-2 border-gray-500"/>
                                    @error('password_confirmation')
                                        <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                                    @enderror
                            </fieldset>
                        </fieldset>
                    </fieldset>
                    <input type="submit" value="Crea" 
                        class="btn border-none px-16 hover:bg-lavanda text-white font-bold font-montserrat text-lg bg-lavanda rounded-lg py-1 mt-6 normal-case"/>
                </form>
                <footer class="flex justify-around gap-4 items-center mt-4 xl:flex-row lg:flex-col md:flex-col sm:flex-col flex-col">
                    <p class="text-white font-quicksand text-sm">Hai già un account?</p>
                    <a href="/login" class="text-white font-bold font-quicksand text-sm hover:underline">Accedi</a>
                </footer>
            </section>
        </main>
        @vite('resources/js/preview.js')
    </body>
</html>