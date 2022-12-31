<section class="flex flex-col bg-dark-mode-2 w-3/4 rounded-xl mt-8 p-8">
    <header>
        <div class="w-full flex flex-col xl:flex-row lg:flex-row md:flex-row sm:flex-col gap-6">
            <div class="flex flex-col items-center gap-4">
                <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                    class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                <a href="/user/{{$creator["username"]}}" class="text-white font-bold font-quicksand text-lg hover:underline">{{ "@".$creator["username"] }}</a>
            </div>
            <div class="flex flex-col gap-1 items-start">
                <h2 class="text-white font-quicksand text-xl font-bold">{{ $creator["name"] }} {{ $creator["surname"] }}</h2>
                <p class="text-white text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm font-quicksand">
                    Membro dal {{date('Y', strtotime($creator["created_at"]))}}
                </p>
            </div>
        </div>
    </header>
    <p class="text-white font-quicksand text-xl text-left xl:text-justify lg:text-justify md:text-justify sm:text-left my-6">
        {{ $post["textual_content"] }}
    </p>
    <label for="post/{{$post["id"]}}" class="text-white font-lg font-quicksand font-bold hover:underline hover:cursor-pointer pb-8">
        Mostra tutto
    </label>
    <footer>
        <ul class="grid gap-y-4 grid-cols-2 grid-rows-2 
                   xl:grid-cols-4 xl:grid-rows-1 
                   lg:grid-cols-4 lg:grid-rows-1 
                   md:grid-cols-4 md:grid-rows-1 
                   sm:grid-cols-2 sm:grid-rows-2 
                   place-items-center list-none text-white font-bold font-quicksand">
            <li>
                <button class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-heart"></i>
                    <span>{{ $post["number_of_likes"] }}</span>
                </button>
            </li>
            <li>
                <label for="post@comment" class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-message"></i>
                    <span>{{ $post["number_of_comments"] }}</span>
                </label>
            </li>
            <li>
                <button class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-retweet"></i>
                    <span>{{ $post["number_of_reposts"] }}</span>
                </button>
            </li>
            <li>
                <button class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-bookmark"></i>
                    @if ($bookmarked)
                        <span>1</span>
                    @else
                        <span>0</span>
                    @endif
                </button>
            </li>
        </ul>
    </footer>
</section>

<input type="checkbox" id="post/{{$post["id"]}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3 w-11/12 max-w-5xl flex flex-col xl:flex-row lg:flex-row md:flex-row sm:flex-col">
    <label for="post/{{$post["id"]}}" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col w-full xl:w-3/5 lg:w-3/5 md:w-full sm:full px-8">
        <header>
            <div class="w-full flex flex-col items-center xl:flex-row lg:flex-row md:flex-row sm:flex-col gap-6">
                <div class="flex flex-col items-center gap-4">
                    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                        class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                    <a href="/user/{{$creator["username"]}}" class="text-white font-bold font-quicksand text-lg hover:underline">{{ "@".$creator["username"] }}</a>
                </div>
                <div class="flex flex-col gap-1 items-start">
                    <h2 class="text-white font-quicksand text-xl font-bold">{{ $creator["name"] }} {{ $creator["surname"] }}</h2>
                    <p class="text-white text-lg font-quicksand">
                        Membro dal {{date('Y', strtotime($creator["created_at"]))}}
                    </p>
                </div>
            </div>
        </header>
        <p class="text-white font-quicksand text-lg text-justify my-6">
            {{ $post["textual_content"] }}
        </p>
    </section>
    <aside class="w-full xl:w-2/5 lg:w-2/5 md:w-full sm:full rounded-xl py-2 overflow-auto">
        <x-comment/>
        <x-comment/>
        <x-comment/>
        <x-comment/>
        <x-comment/>
        <x-comment/>
    </aside>
  </div>
</div>

<input type="checkbox" id="post@comment" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="post@comment" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Aggiungi un commento</h3>
        </header>
        <textarea class="rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Nuovo commento..."></textarea>
        <footer class="flex justify-end gap-4">
            <label for="post@comment" class="px-6 py-2 rounded-full 
                                           border-lavanda border-2 hover:bg-dark-lavanda hover:border-dark-lavanda 
                                             hover:cursor-pointer text-white font-bold
                                             font-quicksand text-sm normal-case">
                Annulla
            </label>
            <button class="px-4 py-2 rounded-full hover:bg-dark-lavanda
                         bg-lavanda font-bold border-none
                         text-white font-quicksand text-sm normal-case">
              Commenta
            </button>
        </footer>
    </section>
  </div>
</div>