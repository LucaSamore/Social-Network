<div class="bg-dark-mode-2 w-full rounded-xl">
    <div class="flex px-4 py-4">
        <div class="flex w-3/4 gap-4">
            <div class="flex flex-col items-center gap-4">
                @if ($comment["user"]["profile_image"] !== null)
                    <img src="{{$comment["user"]["profile_image"]}}" alt="user profile picture" width="64" height="64" 
                        class="w-12 h-12 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @else
                    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                        class="w-12 h-12 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @endif
            </div>
            <div class="flex flex-col gap-1 items-start">
                <h2 class="text-white font-quicksand text-sm font-bold">{{ $comment["user"]["name"] }}</h2>
                <a href="/profile/{{ $comment["user"]["username"] }}" class="text-white font-bold font-quicksand text-sm hover:underline">{{"@".$comment["user"]["username"]}}</a>
            </div>
        </div>
        <div class="flex flex-col w-1/4">
            <button class="flex flex-col gap-2 items-center text-white border-none">
                <i class="fa-solid fa-heart"></i>
                <span>{{ $comment["number_of_likes"] }}</span>
            </button>
        </div>
    </div>
    <p class="text-white text-sm font-quicksand text-justify px-4 py-4">
        {{ $comment["textual_content"] }}
    </p>
</div>

