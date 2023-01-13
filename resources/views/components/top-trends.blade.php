<aside class="w-1/6 xl:1/5 lg:1/5 md:1/6 sm:1/6 hidden px-auto xl:flex lg:hidden md:hidden sm:hidden flex-col justify-center items-center gap-12">
    <x-search-bar/>
    <section class="flex flex-col justify-evenly items-center gap-6 bg-dark-mode-2 rounded-lg w-4/5 h-2/5 overflow-auto px-6">
        <header class="text-center">
            <h2 class="text-white font-montserrat font-bold text-lg xl:text-lg lg:text:lg md:text-sm sm:text-sm">Trend più seguiti 🤩</h2>
        </header>
        <div class="flex gap-12 text-white font-quicksand">
            <ul class="font-bold flex flex-col gap-4 text-lg">
                @foreach ($trends as $trend)
                    <li>{{ $trend->name }}</li>
                @endforeach
            </ul>
            <ul class="flex flex-col gap-4 text-lg">
                @foreach ($trends as $trend)
                    <li>{{ $trend->posts_count }}</li>
                @endforeach
            </ul>
        </div>
    </section>
</aside>