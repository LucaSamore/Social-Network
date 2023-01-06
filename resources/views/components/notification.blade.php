<div class="w-2/3 flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-6 mt-6
    justify-start items-center xl:items-start lg:items-start md:items-center sm:items-center
    bg-dark-mode-2 hover:bg-dark-mode-3 rounded-xl px-4 py-4">
    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
        class="w-16 h-16 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
    <div class="flex flex-col gap-1">
        <div class="flex gap-2">
            <a href="/profile/{{$notification->sender->username}}" 
                class="text-white font-bold text-lg font-quicksand hover:underline">{{ "@".$notification->sender->username }}</a>
            <p class="text-lg font-quicksand">{{ (now()->diff($notification->created_at)->format('%a') + 1)."g" }}</p>
        </div>
        <p class="text-white font-quicksand text-lg">{{$notification->type}}</p>
    </div>
</div>