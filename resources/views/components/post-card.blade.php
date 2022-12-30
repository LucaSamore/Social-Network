<section class="flex flex-col bg-dark-mode-2 w-3/4 rounded-xl mt-8 p-8">
    <header>
        <div class="flex gap-6">
            <div class="flex flex-col gap-2">
                <img src="{{asset('img/default-avatar.png')}}" id="preview" alt="user profile picture" width="64" height="64" 
                    class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                <p class="text-white font-bold font-quicksand text-lg">@lucasamo</p>
            </div>
            <div class="flex flex-col gap-1">
                <h2 class="text-white font-quicksand text-xl font-bold">Luca</h2>
                <p class="text-white text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm font-quicksand">Membro da dicembre 2022</p>
            </div>
        </div>
    </header>
    <article class="text-white font-quicksand text-xl text-left xl:text-justify lg:text-justify md:text-justify sm:text-left my-6">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Tempora rerum distinctio nemo esse, perferendis doloribus nihil voluptatum minus, ipsa, 
        fugit odit id sunt similique unde expedita soluta! Dignissimos, veritatis consequatur!
    </article>
    <footer>
        <ul class="grid gap-y-4 grid-cols-2 grid-rows-2 
                   xl:grid-cols-4 xl:grid-rows-1 
                   lg:grid-cols-4 lg:grid-rows-1 
                   md:grid-cols-4 md:grid-rows-1 
                   sm:grid-cols-2 sm:grid-rows-2 
                   place-items-center list-none text-white font-bold font-quicksand">
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-heart"></i>
                <span>12</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-message"></i>
                <span>12</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-retweet"></i>
                <span>12</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-bookmark"></i>
                <span>12</span>
            </li>
        </ul>
    </footer>
</section>