<div class="bg-dark-mode-2 w-full rounded-xl">
    <div class="flex px-4 py-4">
        <div class="flex w-3/4 gap-4">
            <div class="flex flex-col items-center gap-4">
                @if ($comment->user->profile_image !== null)
                    <img src="{{ $comment->user->profile_image }}" alt="user profile picture" width="64" height="64" 
                        class="w-12 h-12 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @else
                    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                        class="w-12 h-12 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @endif
                @if ($comment->user->username === Session::get('username'))
                    <label for="comment/{{$comment->id}}" class="text-white font-quicksand text-sm hover:underline hover:cursor-pointer">Modifica</label>                  
                @endif
            </div>
            <div class="flex flex-col gap-1 items-start">
                <h2 class="text-white font-quicksand text-sm font-bold">{{ $comment->user->name }}</h2>
                <a href="/profile/{{ $comment->user->username }}" class="text-white font-bold font-quicksand text-sm hover:underline">{{ "@".$comment->user->username }}</a>
            </div>
        </div>
        <div class="flex flex-col w-1/4">
            <button class="flex flex-col gap-2 items-center text-white border-none">
                <i class="fa-solid fa-heart"></i>
                <span>{{ $comment->number_of_likes }}</span>
            </button>
        </div>
    </div>
    <p class="text-white text-sm font-quicksand text-justify px-4 py-4">
        {{ $comment->textual_content }}
    </p>
</div>

<input type="checkbox" id="comment/{{$comment->id}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="comment/{{$comment->id}}" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Modifica commento</h3>
        </header>
        <textarea id="area/{{ $comment->id }}" name="comment" class="rounded-xl text-white font-xl font-quicksand px-4 py-4">{{ $comment->textual_content }}</textarea>
        @error('error')
            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
        @enderror
        <footer class="flex justify-end gap-4">
            <button class="delete-comment-btn rounded-lg px-6 py-2 btn hover:bg-red-500
                        bg-red-600 font-bold border-none mr-auto
                        text-white font-montserrat text-sm normal-case">
                    Elimina
                <input type="hidden" value="{{ $comment->id }}" />
            </button>
            <button class="btn update-comment-btn px-6 py-2 rounded-lg hover:bg-dark-lavanda
                         bg-lavanda font-bold border-none
                         text-white font-quicksand text-sm normal-case">
              Aggiorna
              <input type="hidden" value="{{ $comment->id }}" />
            </button>
        </footer>
    </section>
  </div>
</div>

