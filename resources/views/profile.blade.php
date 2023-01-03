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
                            <img src="{{asset('img/mountains.jpg')}}" alt="user profile picture" width="64" height="64" 
                                class="w-32 h-32 object-cover rounded-full border-2 border-gray-500" />
                        </figure>
                    </div>
                    <div class="w-1/2 flex gap-6 justify-evenly items-center">
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">12</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">post</p>
                        </div>
                        <label class="flex flex-col gap-3 justify-center items-center">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">368</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">follower</p>
                        </label>
                        <label class="flex flex-col gap-3 justify-center items-center">
                            <p class="text-white font-bold font-montserrat text-xl xl:text-2xl lg:text-2xl md:text-xl sm:text-xl">280</p>
                            <p class="text-white font-bold font-quicksand text-sm xl:text-lg lg:text-lg md:text-sm sm:text-sm">seguiti</p>
                        </label>
                    </div>
                </div>
                <h1 class="text-white font-bold font-montserrat text-lg xl:text-2xl lg:text-2xl md:text-xl sm:text-lg">Luca Samorè</h1>
                <p class="text-white font-quicksand text-xl">@lucasamo</p>
                <p class="text-white font-quicksand text-lg text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos id itaque enim ab, cupiditate suscipit repellat aliquid dignissimos similique quod unde veniam, eveniet iure fuga optio culpa dolores alias quo.
                </p>
                {{-- <button class="btn w-full mt-2 bg-lavanda hover:bg-dark-lavanda border-none text-white normal-case font-montserrat">
                    Segui
                </button>
                <button class="btn w-full mt-2 bg-black border-lavanda border-2 text-white normal-case font-montserrat">
                    Non seguire più
                </button>
                <a href="/{{ $username }}/posts">Posts</a> --}}
            </header>
            <section id="feeds" class="flex flex-col justify-start items-center w-3/4 pb-12
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl">
                @forelse ($posts as $post)
                    <x-post-card 
                        :post="$post"
                        :creator="$post->user"
                        :images="$post->images"
                        :videos="$post->videos"
                        :bookmarked="false"
                        :comments="$post->comments"
                        :tags="$post->tags"
                        :editable="false"
                    />
                @empty
                    <h2 class="text-white font-quicksand text-2xl">Non hai post da visualizzare...</h2>
                @endforelse
            </section>
        </main>
        <x-top-trends :trends="$trends"/>
        @vite('resources/js/post.js')
        @vite('resources/js/like.js')
        @vite('resources/js/comment.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>