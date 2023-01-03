<input type="checkbox" id="followers" class="modal-toggle" />
<label for="followers" class="modal cursor-pointer">
  <label class="modal-box relative bg-dark-mode-2 overflow-auto">
    <header class="flex justify-center items-center">
        <h3 class="text-xl font-bold text-white font-montserrat border-b-4 border-lavanda">Followers</h3>
    </header>
    <div class="flex flex-col gap-6 mt-8">
        @foreach ($followers as $follower)
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
                <button class="btn border-none w-1/3 bg-lavanda hover:bg-dark-lavanda normal-case text-white font-montserrat">Segui</button>
            </div>
        @endforeach
    </div>
  </label>
</label>