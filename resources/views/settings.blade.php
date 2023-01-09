<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Impostazioni</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>
    <body class="flex overflow-hidden">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen overflow-auto">
            <header class="pt-8 pb-4 w-3/4 flex flex-col gap-4 justify-center items-center">
                <h1 class="text-white text-center font-bold font-montserrat pb-16 text-4xl xl:text-8xl lg:text-8xl md:text-6xl sm:text-6xl">Impostazioni 🎈</h1>
                @if ($isRead)
                    <div class="chat chat-start mt-6 mr-auto w-full">
                        <div class="chat-image avatar">
                        <p class="w-10 text-6xl">
                            😸
                        </p>
                        </div>
                        <p class="chat-bubble bg-dark-mode-3 text-white font-quicksand font-bold text-xl">Hey! Hai delle nuove notifiche!</p>
                    </div>
                @endif
            </header>
            <section class="flex flex-col justify-start items-center w-3/4 pb-8 rounded-xl
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5">
                <form action="/user/edit" method="post" enctype="multipart/form-data" class="flex flex-col gap-6 justify-center items-center w-3/4 xl:w-3/5 lg:w-3/4 md:w-3/4 sm:w-3/4">
                    @csrf
                    <fieldset class="w-full flex gap-12 mb-4">
                        @if ($user->profile_image !== null)
                        <img src="{{ $user->profile_image }}" alt="user profile picture" width="64" height="64" id="preview"
                            class="w-32 h-32 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @else
                            <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" id="preview" 
                                class="w-32 h-32 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @endif
                        <div id="dropzone" class="w-full">
                            <label
                                class="flex justify-center w-full h-32 px-4 transition border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                                <span class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span class="font-medium text-white">
                                        Allega immagine o video, oppure
                                        <span class="text-white underline">seleziona</span>
                                    </span>
                                </span>
                                <label>
                                    <input type="file" id="input-preview" accept="image/*" name="profile_image" class="hidden" />
                                </label>
                            </label>
                            @error('media')
                                    <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="flex justify-end items-end w-full">
                        <button id="delete-preview" class="px-4 py-2 text-white font-bold font-quicksand rounded-xl bg-red-500 hover:bg-red-700">Elimina</button>
                    </div>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="username" class="text-white font-quicksand text-lg">Username:</label>
                        <input type="text" placeholder="Username" name="username" value="{{$user->username}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="bio" class="text-white font-quicksand text-lg">Bio:</label>
                        <textarea class="textarea textarea-bordered w-full bg-dark-mode-3 text-white font-quicksand" name="bio" placeholder="Bio">{{$user->bio}}</textarea>
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="name" class="text-white font-quicksand text-lg">Nome:</label>
                        <input type="text" placeholder="Nome" name="name" value="{{$user->name}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="surname" class="text-white font-quicksand text-lg">Cognome:</label>
                        <input type="text" placeholder="Cognome" name="surname" value="{{$user->surname}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="date_of_birth" class="text-white font-quicksand text-lg">Data di nascita:</label>
                        <input type="date" placeholder="Data di nascita" name="date_of_birth" value="{{$user->date_of_birth}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="email" class="text-white font-quicksand text-lg">Email:</label>
                        <input type="email" placeholder="Email" name="email" value="{{$user->email}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="password" class="text-white font-quicksand text-lg">Password:</label>
                        <input type="password" placeholder="Password" name="password" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="password_confirmation" class="text-white font-quicksand text-lg">Password:</label>
                        <input type="password" placeholder="Conferma password" name="password_confirmation" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                    </fieldset>
                    <input type="submit" value="Aggiorna" 
                        class="btn border-none px-16 hover:bg-lavanda text-white font-bold font-montserrat text-lg bg-lavanda rounded-lg py-1 mt-6 normal-case"/>
                </form>
            </section>
        </main>
        @vite('resources/js/preview.js')
        @vite('resources/js/post.js')
        @vite('resources/js/refresh.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>