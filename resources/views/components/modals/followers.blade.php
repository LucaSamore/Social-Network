<input type="checkbox" id="followers" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-2">
    <label for="followers" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <header class="flex justify-center items-center">
        <h3 class="text-xl font-bold text-white font-montserrat border-b-4 border-lavanda">Followers</h3>
    </header>
    <div class="flex flex-col gap-6 mt-8">
        @foreach ($user->followers as $follower)
            <div class="flex justify-between hover:bg-dark-mode-3 p-4 rounded-xl">
                <div class="flex justify-center items-center gap-4">
                    <figure>
                        @if ($follower->userFollowee->profile_image !== null)
                            <img src="{{ $follower->userFollowee->profile_image }}" alt="user profile picture" width="64" height="64" 
                                class="w-14 h-14 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @else
                            <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                                class="w-14 h-14 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @endif
                    </figure>
                    <a href="/profile/{{$follower->userFollowee->username}}"
                        class="text-white font-quicksand text-lg hover:underline">{{"@".$follower->userFollowee->username}}</a>
                </div>
                {{-- <button class="btn border-none w-1/3 bg-lavanda hover:bg-dark-lavanda normal-case text-white font-montserrat">Segui</button> --}}
    
                <button class="toggle-follower unfollow btn border-lavanda border-2 hover:border-dark-lavanda 
                             bg-dark-mode-2 hover:bg-dark-lavanda normal-case text-white font-montserrat">
                    Non seguire più
                </button>
            </div>
        @endforeach
    </div>
  </div>
</div>