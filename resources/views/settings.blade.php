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
                <h2 class="text-white text-3xl font-bold font-quicksand pb-12 mb-12 text-center">Modifica i dati del tuo account</h2>
                <form action="/user/edit" method="post" enctype="multipart/form-data" class="flex flex-col gap-6 justify-center items-center w-3/4 xl:w-3/5 lg:w-3/4 md:w-3/4 sm:w-3/4">
                    @csrf
                    <fieldset class="w-full flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-12 items-center mb-4">
                        @if ($user->profile_image !== null)
                        <img src="{{ $user->profile_image }}" alt="user profile picture" width="64" height="64" id="preview"
                            class="w-32 h-32 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @else
                            <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" id="preview" 
                                class="w-32 h-32 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @endif
                        <div id="dropzone-profile" class="w-full">
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
                                <div>
                                    <input type="file" id="input-preview" accept="image/*" name="profile_image" class="hidden" />
                                </div>
                            </label>
                            @error('media')
                                    <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="flex justify-end items-end w-full">
                        <button id="delete-preview" class="px-4 py-2 text-white font-bold font-quicksand rounded-md bg-red-500 hover:bg-red-700">Elimina</button>
                    </div>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="username" class="text-white font-quicksand text-lg">Username:</label>
                        <input id="username" type="text" placeholder="Username" name="username" value="{{$user->username}}" required class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('username')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="bio" class="text-white font-quicksand text-lg">Bio:</label>
                        <textarea id="bio" class="textarea textarea-bordered w-full bg-dark-mode-3 text-white font-quicksand" name="bio" placeholder="Bio">{{$user->bio}}</textarea>
                        @error('bio')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="name" class="text-white font-quicksand text-lg">Nome:</label>
                        <input id="name" type="text" placeholder="Nome" name="name" value="{{$user->name}}" required class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('name')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="surname" class="text-white font-quicksand text-lg">Cognome:</label>
                        <input id="surname" type="text" placeholder="Cognome" name="surname" value="{{$user->surname}}" required class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('surname')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="date_of_birth" class="text-white font-quicksand text-lg">Data di nascita:</label>
                        <input id="date_of_birth" type="date" name="date_of_birth" required value="{{$user->date_of_birth}}" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('date_of_birth')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="email" class="text-white font-quicksand text-lg">Email:</label>
                        <input id="email" type="email" placeholder="Email" name="email" value="{{$user->email}}" required class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('email')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="password" class="text-white font-quicksand text-lg">Password:</label>
                        <input id="password" type="password" placeholder="Password" required name="password" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('password')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="w-full flex flex-col gap-2 justify-center items-start">
                        <label for="password_confirmation" class="text-white font-quicksand text-lg">Conferma password:</label>
                        <input id="password_confirmation" type="password" placeholder="Conferma password" required name="password_confirmation" class="input input-bordered w-full bg-dark-mode-3 text-white font-quicksand" />
                        @error('password_confirmation')
                            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <input type="submit" value="Aggiorna" 
                        class="btn border-none px-16 hover:bg-lavanda text-white font-bold font-montserrat text-lg bg-lavanda rounded-lg py-1 mt-6 normal-case"/>
                </form>
                <footer class="border-2 border-red-700 rounded-lg w-3/4 mt-12 flex flex-col">
                    <h3 class="text-white font-montserrat text-2xl p-4">Danger Zone 💀</h3>
                    <div class="flex flex-col xl:flex-row lg:flex-row md:flex-row sm:flex-col justify-evenly items-center gap-6 py-6">
                        <p class="text-white font-quicksand text-xl">Cancella il tuo account</p>
                        <label for="delete-account" class="text-white font-montserrat font-bold bg-red-500 px-6 py-2 rounded-md btn normal-case hover:bg-red-700 border-none">Elimina</label>
                    </div>
                </footer>
            </section>
            <!-- Confirm account elimination -->
            <input type="checkbox" id="delete-account" class="modal-toggle" />
            <div class="modal">
            <div class="modal-box relative bg-dark-mode-3">
                <label for="delete-account" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
                <section>
                    <header>
                        <h3 class="text-xl text-white font-montserrat font-bold">Elimina account</h3>
                    </header>
                    <p class="py-4 text-white font-quicksand text-lg">Sei sicuro?</p>
                    <footer class="flex justify-end gap-4 items-end">
                        <button id="delete-account-btn" class="rounded-lg px-6 py-2 btn hover:bg-red-700
                                    bg-red-500 font-bold border-none
                                    text-white font-montserrat text-sm normal-case">
                            Elimina
                        </button>
                    </footer>
                </section>
            </div>
            </div>
        </main>
        @vite('resources/js/account.js')
        @vite('resources/js/post.js')
        @vite('resources/js/preview.js')
        @vite('resources/js/refresh.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>