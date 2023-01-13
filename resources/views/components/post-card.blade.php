<section class="flex flex-col bg-dark-mode-2 w-full xl:w-3/4 lg:w-3/4 md:w-3/4 sm:w-full rounded-xl mt-8 p-8">
    <header>
        <div class="w-full flex flex-col xl:flex-row lg:flex-row md:flex-col sm:flex-col gap-6 justify-start">
            <div class="flex flex-col items-center gap-4">
                @if ($creator->profile_image !== null)
                    <img src="{{$creator->profile_image}}" alt="user profile picture" width="64" height="64" 
                        class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @else
                    <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                        class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                @endif
                <a href="/profile/{{$creator->username}}" class="text-white font-bold font-quicksand text-lg hover:underline">{{ "@".$creator->username }}</a>
            </div>
            <div class="flex flex-col gap-1 items-center xl:items-start lg:items-start md:items-center sm:items-center">
                <h2 class="text-white font-quicksand text-xl font-bold">{{ $creator->name }} {{ $creator->surname }}</h2>
                <p class="text-white text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm font-quicksand">
                    Membro dal {{date('Y', strtotime($creator->created_at))}}
                </p>
            </div>
            @if ($editable)
                <div class="dropdown dropdown-end ml-auto">
                    <label tabindex="0" class="btn m-1 bg-dark-lavanda hover:bg-dark-lavanda border-none normal-case text-white font-montserrat text-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu p-4 shadow bg-dark-mode-3 rounded-box w-52">
                    <li>
                        <label for="post/{{ $post->id }}/update" class="text-white font-quicksand active:bg-dark-mode-4">
                            Modifica
                        </label>
                    </li>
                    <li>
                        <label for="post/{{ $post->id }}/delete" class="text-white font-quicksand hover:bg-red-500 mt-2 active:bg-dark-mode-4">
                            Elimina
                        </label>
                    </li>
                    </ul>
                </div>
            @endif
        </div>
    </header>
    <p class="text-white font-quicksand text-xl text-left xl:text-justify lg:text-justify md:text-justify sm:text-left mt-6 mb-3">
        {{ $post->textual_content }}
    </p>

    <p class="font-quicksand text-lg my-2">{{ (now()->diff($post->created_at)->format('%a') + 1)." giorni fa" }}</p>

    <div class="w-full flex flex-wrap gap-4 py-3 mt-2">
        @foreach ($tags as $tag)
            <p class="text-white font-quicksand text-lg bg-lavanda px-4 py-2 rounded-full">{{ $tag->name }}</p>
        @endforeach
    </div>

    <div id="media-{{$post->id}}" class="w-full flex justify-center items-center py-3">
        @forelse ($images as $image)
            <img src="{{ $image->path }}" alt="user image post" class="rounded-md object-cover">
        @empty
            @forelse ($videos as $video)
                <video width="640" height="480" controls muted autoplay muted class="rounded-xl">
                    <source src="{{ $video->path }}" type="video/mp4">
                    <source src="{{ $video->path }}" type="video/ogg">
                    Il tuo browser non supporta il tag video
                </video>
            @empty
                
            @endforelse
        @endforelse
    </div>

    <label for="post/{{$post->id}}" class="text-white font-lg font-quicksand font-bold hover:underline hover:cursor-pointer mb-8">
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
                <button class="like-btn flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-heart"></i>
                    <span id="like-span/{{ $post->id }}">{{ $post->number_of_likes }}</span>
                    <input type="hidden" class="like" value="{{ $post->id }}" />
                </button>
            </li>
            <li>
                <label for="post/{{ $post->id }}/comment" class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-message"></i>
                    <span>{{ $post->number_of_comments }}</span>
                </label>
            </li>
            <li>
                <button disabled class="flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-retweet"></i>
                    <span>{{ $post->number_of_reposts }}</span>
                </button>
            </li>
            <li>
                <button class="bookmark-btn flex gap-2 items-center btn bg-lavanda text-white border-none hover:bg-dark-lavanda">
                    <i class="fa-solid fa-bookmark"></i>
                    <input type="hidden" value="{{ $post->id }}" class="bookmark" />
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

<!-- Post details modal -->
<input type="checkbox" id="post/{{ $post->id }}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3 w-11/12 max-w-5xl flex flex-col xl:flex-row lg:flex-row md:flex-row sm:flex-col">
    <label for="post/{{ $post->id }}" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col w-full xl:w-3/5 lg:w-3/5 md:w-full sm:full px-8">
        <header>
            <div class="w-full flex flex-col items-center xl:flex-row lg:flex-row md:flex-row sm:flex-col gap-6">
                <div class="flex flex-col items-center gap-4">
                    @if ($creator->profile_image !== null)
                        <img src="{{ $creator->profile_image }}" alt="user profile picture" width="64" height="64" 
                            class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                    @else
                        <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                            class="w-24 h-24 object-cover xl:rounded-full lg:rounded-full md:rounded-none sm:rounded-none rounded-none border-2 border-gray-500" />
                    @endif
                    <a href="/profile/{{ $creator->username }}" class="text-white font-bold font-quicksand text-lg hover:underline">{{ "@".$creator->username }}</a>
                </div>
                <div class="flex flex-col gap-1 items-center xl:items-start lg:items-start md:items-start sm:items-center">
                    <h2 class="text-white font-quicksand text-xl font-bold">{{ $creator->name }} {{ $creator->surname }}</h2>
                    <p class="text-white text-lg font-quicksand">
                        Membro dal {{date('Y', strtotime($creator->created_at))}}
                    </p>
                </div>
            </div>
        </header>
        <p class="text-white font-quicksand text-lg text-justify my-6">
            {{ $post->textual_content }}
        </p>
        <p class="font-quicksand text-lg my-2">{{ (now()->diff($post->created_at)->format('%a') + 1)." giorni fa" }}</p>
        <div class="w-full flex flex-wrap gap-4 py-3 mt-2">
            @foreach ($tags as $tag)
                <p class="text-white font-quicksand text-lg bg-lavanda px-4 py-2 rounded-full">{{ $tag->name }}</p>
            @endforeach
        </div>

        <div class="w-full flex items-center py-3">
            @forelse ($images as $image)
                <img src="{{ $image->path }}" alt="user image post" class="rounded-md object-cover">
            @empty
                @forelse ($videos as $video)
                    <video width="640" height="480" controls muted autoplay muted class="rounded-xl">
                        <source src="{{ $video->path }}" type="video/mp4">
                        <source src="{{ $video->path }}" type="video/ogg">
                        Il tuo browser non supporta il tag video
                    </video>
                @empty
                    
                @endforelse
            @endforelse
        </div>
        
    </section>
    <aside class="flex flex-col justify-start items-center gap-3 w-full xl:w-2/5 lg:w-2/5 md:w-full sm:w-full rounded-xl py-4 mt-3 xl:overflow-auto lg:overflow-auto md:overflow-auto">
        @forelse ($comments as $comment)
            <x-comment :comment="$comment"/>
        @empty
            <p class="text-white font-2xl font-quicksand font-bold bg-dark-mode-2 rounded-full px-4 py-2">Non ci sono commenti</p>
        @endforelse
    </aside>
  </div>
</div>

<!-- Create comment modal -->
<input type="checkbox" id="post/{{ $post->id }}/comment" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="post/{{ $post->id }}/comment" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section class="flex flex-col gap-8">
        <header>
            <h3 class="text-xl font-bold text-white font-montserrat">Aggiungi un commento</h3>
        </header>
        <textarea id="area/{{ $post->id }}" name="new-comment" class="rounded-xl text-white font-xl font-quicksand px-4 py-4" placeholder="Nuovo commento..."></textarea>
        @error('error')
            <span class="text-red-600 font-quicksand font-bold text-sm">{{ $message }}</span>
        @enderror
        <footer class="flex justify-end gap-4">
            <label for="post/{{ $post->id }}/comment" class="px-6 py-2 rounded-full 
                                           border-lavanda border-2 hover:bg-dark-lavanda hover:border-dark-lavanda 
                                             hover:cursor-pointer text-white font-bold
                                             font-quicksand text-sm normal-case">
                Annulla
            </label>
            <button class="comment-btn px-4 py-2 rounded-full hover:bg-dark-lavanda
                         bg-lavanda font-bold border-none
                         text-white font-quicksand text-sm normal-case">
              Commenta
              <input type="hidden" value="{{ $post->id }}" />
            </button>
        </footer>
    </section>
  </div>
</div>

<!-- Confirm elimination modal -->
<input type="checkbox" id="post/{{ $post->id }}/delete" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-dark-mode-3">
    <label for="post/{{ $post->id }}/delete" class="btn btn-sm btn-circle absolute right-2 top-2 bg-dark-mode-4 hover:bg-dark-mode-2 border-none">✕</label>
    <section>
        <header>
            <h3 class="text-xl text-white font-montserrat font-bold">Elimina post</h3>
        </header>
        <p class="py-4 text-white font-quicksand text-lg">Sei sicuro?</p>
        <footer class="flex justify-end gap-4 items-end">
            <button class="delete-btn rounded-lg px-6 py-2 btn hover:bg-red-500
                        bg-red-600 font-bold border-none
                        text-white font-montserrat text-sm normal-case">
                Elimina
                <input type="hidden" value="{{ $post->id }}" />
            </button>
        </footer>
    </section>
  </div>
</div>

<!-- Update post modal -->
<x-modals.edit-post :post="$post" />