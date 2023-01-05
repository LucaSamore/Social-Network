<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body class="flex overflow-hidden">
    <x-side-menu />
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
        </header>
        <section>
            <ul class="menu bg-base-100 w-full lg:w-1/3 rounded-box text-white py-4 ">
                @foreach($notifications as $notify)
                <li class="w-full flex-row rounded-none border-y-2 border-white p-2">

                    <!-- Immagine Profilo -->
                    <div class="w-12 avatar p-0">
                        <div class="w-full rounded-full">
                            <img src="https://placeimg.com/192/192/people" />
                        </div>
                    </div>

                    <div class="w-2/6 flex-col grow p-0 pl-2">
                        <div class="w-full">
                            <h2 class="float-left mr-2 font-bold">{{"@".$notify->fromUsername}}</h2>
                            <p class="font-thin text-xs float-left">{{$notify->created_at}}</p>
                        </div>

                        <p class="text-base  w-full">{{$notify->type}}</p>
                    </div>

                    <button class="w-2/5 h-full btn btn-outline rounded-3xl ">
                        @if ($notify->follow)
                        Non Seguire Più
                        @else
                        Segui
                        @endif
                    </button>
                </li>
                @endforeach
            </ul>
        </section>
    </main>
    <x-top-trends :trends="$trends" />
    @vite('resources/js/post.js')
    @vite('resources/js/like.js')
    @vite('resources/js/comment.js')
    @vite('resources/js/refresh.js')
    <script src="https://kit.fontawesome.com/6b12fba364.js" crossorigin="anonymous"></script>
</body>

</html>