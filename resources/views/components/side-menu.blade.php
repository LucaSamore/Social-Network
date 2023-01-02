<aside class="w-1/6 xl:w-1/5 lg:w-1/6 md:w-1/6 sm:w-1/6 flex flex-col gap-4 justify-evenly items-center bg-dark-mode-2">
    <nav class="w-full my-4">
        <ul class="flex flex-col list-none items-center gap-8 text-2xl font-bold font-quicksand text-white">
            <li class="hover:bg-lavanda px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-150">
                <a href="/home" class="flex gap-4 items-center">
                    <i class="fa-solid fa-house"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Home</span>
                </a>
            </li>
            <li class="hover:bg-lavanda px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-300">
                <a href="/profile" class="flex gap-4 items-center">
                    <i class="fa-solid fa-user"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Profilo</span>
                </a>
            </li>
            <li class="hover:bg-lavanda px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-300 flex gap-4 items-center">
                <a href="/notifications" class="flex gap-4 items-center">
                    <i class="fa-solid fa-bell"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Notifiche</span>
                </a>
            </li>
            <li class="hover:bg-lavanda px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-300 flex gap-4 items-center">
                <a href="/bookmarks" class="flex gap-4 items-center">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Bookmarks</span>
                </a>
            </li>
            <li class="hover:bg-lavanda px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100 
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-300 flex gap-4 items-center">
                <a href="/settings" class="flex gap-4 items-center">
                    <i class="fa-solid fa-gear"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Impostazioni</span>
                </a>
            </li>
            <li class="hover:bg-red-600 px-4 xl:px-8 lg:px-8 md:px-8 sm:px-4 py-2 rounded-full transition-none ease-in-out delay-100
                            xl:transition lg:transition md:transition sm:transition-none
                            xl:hover:-translate-y-1 lg:hover:-translate-y-1 md:hover:-translate-y-1 sm:hover:-translate-y-0
                            hover:-translate-y-0 hover:scale-110 duration-300">
                <a href="/logout" class="flex gap-2 items-center">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Esci</span>
                </a>
            </li>
        </ul>
    </nav>
    <label for="new-post" class="btn border-none hover:bg-dark-lavanda
                        text-white font-bold font-montserrat 
                        text-lg bg-lavanda rounded-full
                        px-4 py-2 xl:px-16 xl:py-2 lg:px-12 lg:py-2 md:px-8 md:py-2 sm:px-4 sm:py-2 normal-case">
        <div class="block xl:hidden lg:block md:block sm:block">
            <i class="fa-solid fa-plus"></i>
        </div>
        <span class="hidden xl:block lg:hidden md:hidden sm:hidden">Nuovo post</span>
    </label>
</aside>

<input type="checkbox" id="new-post" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="new-post" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Crea un post ✍🏻</h3>
        </header>
        <form action="/post/create" method="post" class="w-full flex flex-col items-center gap-8">
            <textarea class="w-full h-32 rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Scrivi qualcosa..."></textarea>
            @error('error')
                <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
            @enderror

            <fieldset id="media-content">

            </fieldset>

            <!-- <img id="new-image" src="{{asset('img/mountains.jpg')}}" alt="user image post" class="rounded-md object-cover"> -->

            <!-- <video id="new-video" width="640" height="480" controls muted autoplay muted class="rounded-xl">
                <source src="{{asset('video/dog.mp4')}}" type="video/mp4">
                <source src="{{asset('video/dog.mp4')}}" type="video/ogg">
                Il tuo browser non supporta il tag video
            </video> -->

            <fieldset id="dropzone" class="w-full">
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
                            <span class="text-white underline">browse</span>
                        </span>
                    </span>
                    <input type="file" id="file-upload" accept="image/*, video/*" name="file-upload" class="hidden">
                </label>
            </fieldset>




            <input type="submit" name="create" value="Crea" class="btn w-1/2 bg-lavanda hover:bg-dark-lavanda text-white font-montserrat font-bold border-none" />
        </form>
    </section>
  </div>
</div>