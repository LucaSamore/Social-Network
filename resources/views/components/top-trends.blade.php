<aside class="w-1/6 xl:1/5 lg:1/5 md:1/6 sm:1/6 hidden xl:flex lg:hidden md:hidden sm:hidden flex-col justify-center items-center gap-12">
    <section class="flex flex-col justify-start items-center gap-6 bg-dark-mode-2 rounded-xl w-4/5 h-1/3 overflow-auto">
        <header class="text-center">
            <h2 class="text-white font-quicksand font-bold text-lg xl:text-lg lg:text:lg md:text-sm sm:text-sm mt-8">Trend più seguiti 🏆</h2>
        </header>
        <section class="flex gap-12 text-white font-quicksand py-4">
            <ul class="font-bold flex flex-col gap-4">
                @foreach ($trends as $trend)
                    <li>#{{ $trend["name"] }}</li>
                @endforeach
            </ul>
            <ul class="flex flex-col gap-4">
                @foreach ($trends as $key => $value)
                    <li>{{ $trend["posts_count"] }}</li>
                @endforeach
            </ul>
        </section>
    </section>
</aside>