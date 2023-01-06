<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Home</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>
    <body class="flex overflow-hidden">
        <x-side-menu/>
        <main class="w-11/12 xl:w-3/5 lg:w-4/5 md:w-11/12 sm:w-11/12 flex flex-col justify-start items-center gap-4 h-screen overflow-auto">
            <header class="pt-8 pb-4 w-3/4 flex flex-col gap-4 justify-center items-center">
                <h1 class="text-white text-center font-bold font-montserrat text-4xl xl:text-8xl lg:text-8xl md:text-6xl sm:text-6xl">{{"Ciao ".session()->get('user_name')." 👋🏻"}}</h1>
                @if(Session::has('success'))
                    <span class="text-green-400 font-montserrat text-center font-bold mt-4 text-lg xl:text-2xl lg:text-2xl md:text-xl sm:text-lg">
                        {{ Session::get('success') }}
                    </span>
                    @php
                        Session::forget('success');
                    @endphp
                @elseif(Session::has('error'))
                    <span class="text-red-600 font-montserrat font-bold text-lg xl:text-2xl lg:text-2xl md:text-xl sm:text-lg mt-4">
                        {{ Session::get('error') }}
                    </span>
                    @php
                        Session::forget('error');
                    @endphp
                @endif

                @if ($isRead)
                    <div class="chat chat-start mt-6 mr-auto w-full">
                        <div class="chat-image avatar">
                        <p class="w-10 text-6xl">
                            😸
                        </p>
                        </div>
                        <p class="chat-bubble bg-dark-mode-3 text-white font-quicksand font-bold text-xl">Hey! Hai delle nuove notifiche!</p>
                    </div>
                @endif
            </header>
            <section id="feeds" class="flex flex-col justify-start items-center w-3/4 pb-12
                            xl:w-4/5 lg:w-3/4 md:w-3/4 sm:w-4/5 rounded-xl">
                @forelse ($feeds as $feed)
                    <x-post-card 
                        :post="$feed"
                        :creator="$feed->user"
                        :images="$feed->images"
                        :videos="$feed->videos"
                        :bookmarked="false"
                        :comments="$feed->comments->sortByDesc('number_of_likes')"
                        :tags="$feed->tags"
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
        @vite('resources/js/refresh.js')
        <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
    </body>
</html>