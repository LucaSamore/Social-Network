<div class="w-3/4 flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-6
      items-center xl:items-start lg:items-start md:items-center sm:items-center border-t-2 border-dark-mode-4
     hover:bg-dark-mode-2 px-4 py-4">
    @if ($user->profile_image !== null)
    <img src="{{ $user->profile_image }}" alt="user profile picture" width="64" height="64" 
        class="w-16 h-16 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
    @else
        <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
            class="w-16 h-16 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
    @endif
    <div class="flex flex-col gap-1">
        <div class="flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-2 items-center xl:items-start lg:items-start md:items-center sm:items-center
            justify-center xl:justify-start lg:justify-start md:justify-center sm:justify-center">
            <a href="/profile/{{$user->username}}" 
                class="text-white font-bold text-lg font-quicksand hover:underline">{{ "@".$user->username }}</a>
            <p class="text-lg font-quicksand">Membro dal {{date('Y', strtotime($user->created_at))}}</p>
        </div>
        <p class="text-white font-quicksand text-lg xl:text-left lg:text-left md:text-center sm:text-center text-center">{{ $user->name." ".$user->surname }}</p>
    </div>
</div>