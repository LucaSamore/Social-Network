<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Profilo</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>
    <body class="flex overflow-hidden">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen overflow-auto">
            <header class="mt-12 pb-4 w-3/4 xl:w-1/2 lg:w-1/2 md:w-1/2 sm:w-3/4 flex flex-col gap-4 justify-center items-start">
                <div class="w-full flex">
                    <div class="w-1/2 flex flex-col gap-4 justify-center items-start">
                        <figure>
                            @if ($user->profile_image !== null)
                                <img src="{{ $user->profile_image }}" alt="user profile picture" width="64" height="64" 
                                    class="w-32 h-32 object-cover rounded-full border-2 border-gray-500" />
                            @else
                                <img src="{{asset('img/default-avatar.png')}}" alt="user profile picture" width="64" height="64" 
                                    class="w-32 h-32 object-cover rounded-full border-2 border-gray-500" />
                            @endif
                        </figure>
                    </div>
                    <div class="w-1/2 flex gap-6 justify-evenly items-center">
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">{{ $user->posts->count() }}</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">post</p>
                        </div>
                        <label for="followers" class="flex flex-col gap-3 justify-center items-center hover:underline hover:cursor-pointer">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">{{ $user->followers->count() }}</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">follower</p>
                        </label>
                        <label for="following" class="flex flex-col gap-3 justify-center items-center hover:underline hover:cursor-pointer">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">{{ $user->followees->count() }}</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">seguiti</p>
                        </label>
                    </div>
                </div>
                <h1 class="text-white font-bold font-montserrat text-lg xl:text-2xl lg:text-2xl md:text-xl sm:text-lg">{{ $user->name." ".$user->surname }}</h1>
                <p class="text-white font-quicksand text-xl">{{ "@".$user->username }}</p>
                <p class="text-white font-quicksand text-lg text-justify">
                    {{ $user->bio }}
                </p>
                <div id="toggle-follow" class="w-full">
                    @if (!$isItMe)
                        @if ($isFollowing !== null)
                            <button id="unfollow-btn" class="btn w-full mt-2 bg-black hover:bg-dark-lavanda border-2 border-lavanda text-white normal-case font-montserrat">
                                Non seguire più
                            </button>
                        @else
                            <button id="follow-btn" class="btn w-full mt-2 bg-lavanda hover:bg-dark-lavanda border-none text-white normal-case font-montserrat">
                                Segui
                            </button>
                        @endif
                    @endif
                </div>
                <input id="my-username" type="hidden" name="me" value="{{ Session::get('username') }}" />
                <input id="other-username" type="hidden" name="other" value="{{ $user->username }}" />
            </header>
            <section id="feeds" class="flex flex-col justify-start items-center w-3/4 pb-12
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl">
                @forelse ($posts as $post)
                    <x-post-card 
                        :post="$post"
                        :creator="$post->user"
                        :images="$post->images"
                        :videos="$post->videos"
                        :bookmarked="$post->bookmarks->where('user_id', Session::get('user_id'))->isNotEmpty()"
                        :comments="$post->comments->sortByDesc('number_of_likes')"
                        :tags="$post->tags"
                        :editable="$isItMe"
                    />
                @empty
                    <h2 class="text-white font-quicksand text-2xl">Non ci sono post</h2>
                @endforelse
            </section>
        </main>
        <x-top-trends :trends="$trends"/>
        <x-modals.followers :followers="$user->followers" :me="Session::get('user_id')" />
        <x-modals.following :following="$user->followees" :me="Session::get('user_id')" />
        @vite('resources/js/profile.js')
        @vite('resources/js/follow-modals.js')
        @vite('resources/js/post.js')
        @vite('resources/js/post-edit.js')
        @vite('resources/js/like.js')
        @vite('resources/js/comment.js')
        @vite('resources/js/refresh.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>