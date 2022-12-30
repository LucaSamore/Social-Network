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
    <label for="post/{{$post["id"]}}" class="text-white font-lg font-quicksand font-bold hover:underline hover:cursor-pointer pb-8">Mostra tutto</label>
    <footer>
        <ul class="grid gap-y-4 grid-cols-2 grid-rows-2 
                   xl:grid-cols-4 xl:grid-rows-1 
                   lg:grid-cols-4 lg:grid-rows-1 
                   md:grid-cols-4 md:grid-rows-1 
                   sm:grid-cols-2 sm:grid-rows-2 
                   place-items-center list-none text-white font-bold font-quicksand">
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-heart"></i>
                <span>{{ $post["number_of_likes"] }}</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-message"></i>
                <span>{{ $post["number_of_comments"] }}</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-retweet"></i>
                <span>{{ $post["number_of_reposts"] }}</span>
            </li>
            <li class="flex gap-2 items-center">
                <i class="fa-solid fa-bookmark"></i>
                @if ($bookmarked)
                    <span>1</span>
                @else
                    <span>0</span>
                @endif
            </li>
        </ul>
    </footer>
</section>

<input type="checkbox" id="post/{{$post["id"]}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative">
    <label for="post/{{$post["id"]}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
    <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
  </div>
</div>