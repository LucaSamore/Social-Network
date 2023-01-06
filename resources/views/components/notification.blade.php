<div class="w-3/4 xl:w-3/4 lg:w-3/4 md:w-1/2 sm:w-1/2 flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-6 mt-6
      items-center xl:items-start lg:items-start md:items-center sm:items-center
    bg-dark-mode-2 hover:bg-dark-mode-3 rounded-xl px-4 py-4">
    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
        class="w-16 h-16 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
    <div class="flex flex-col gap-1">
        <div class="flex gap-2 justify-center xl:justify-start lg:justify-start md:justify-center sm:justify-center">
            <a href="/profile/{{$notification->sender->username}}" 
                class="text-white font-bold text-lg font-quicksand hover:underline">{{ "@".$notification->sender->username }}</a>
            <p class="text-lg font-quicksand">{{ (now()->diff($notification->created_at)->format('%a') + 1)."g" }}</p>
        </div>
        <p class="text-white font-quicksand text-lg xl:text-left lg:text-left md:text-center sm:text-center text-center">{{$notification->type}}</p>
    </div>
    <div class="ml-0 xl:ml-auto lg:ml-auto md:ml-0 sm:ml-0 pt-2">
        @if ($notification->sender->followers->where('follower', $notification->receiver->id)->first())
            <button class="unfollow btn w-36 border-lavanda border-2 hover:border-dark-lavanda bg-dark-mode-2 hover:bg-dark-lavanda normal-case text-white font-montserrat">
                Non seguire più
            </button>
        @else
            <button class="follow btn w-36 border-none bg-lavanda hover:bg-dark-lavanda normal-case text-white font-montserrat">
                Segui
            </button>
        @endif
        <input type="hidden" name="{{ $notification->sender->username }}" value="{{ $notification->sender->username }}" />
    </div>
</div>