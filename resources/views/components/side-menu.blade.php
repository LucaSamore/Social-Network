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
                <a href="/profile/{{ Session::get('username') }}" class="flex gap-4 items-center">
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
<x-modals.create-post/>