<input type="checkbox" id="following" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-2">
    <label for="following" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <header class="flex justify-center items-center">
        <h3 class="text-xl font-bold text-white font-montserrat border-b-4 border-lavanda">Seguiti</h3>
    </header>
    <div class="flex flex-col gap-6 mt-8">
        @foreach ($following as $f)
            <div class="flex justify-between hover:bg-dark-mode-3 p-4 rounded-xl">
                <div class="flex justify-center items-center gap-4">
                    <figure>
                        @if ($f->userFollower->profile_image !== null)
                            <img src="{{ $f->userFollower->profile_image }}" alt="user profile picture" width="64" height="64" 
                                class="w-14 h-14 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @else
                            <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                                class="w-14 h-14 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                        @endif
                    </figure>
                    <a href="/profile/{{$f->userFollower->username}}" 
                        class="text-white font-quicksand text-lg hover:underline">{{"@".$f->userFollower->username}}</a>
                </div>
                <div>
                    @if ($f->userFollower->followers->where('follower', $me)->first())
                        <button class="unfollow btn border-lavanda border-2 hover:border-dark-lavanda bg-dark-mode-2 hover:bg-dark-lavanda normal-case text-white font-montserrat">
                            Non seguire più
                        </button>
                    @else
                        <button class="follow btn w-36 border-none bg-lavanda hover:bg-dark-lavanda normal-case text-white font-montserrat">
                            Segui
                        </button>
                    @endif
                    <input type="hidden" name="{{ $f->userFollower->username }}" value="{{ $f->userFollower->username }}" />
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>