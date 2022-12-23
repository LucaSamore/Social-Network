<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
</head>

<body class="bg-white w-full h-screen">
    <aside class="w-1/4 h-screen bg-black pt-4 card-body self-start ">


        <div class="form-control box-border w-full h-auto my-10 max-w-fit">
            <div class="input-group h-8">
                <input type="text" placeholder="Search…" class="input w-3/4 h-full bg-blue-500 border-0" />
                <button class="h-full w-1/4 p-0 m-0 bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="p-2 pr-0 h-full w-full " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>


        <ul class="menu bg-base-100 w-full p-2 rounded-box text-white font-bold my-10 max-w-fit">
            <li><h2 class="text-xl">I Trend più seguiti</h2></li>
            <li class="flex flex-row  w-full"><a href="#" class="grow">#Mondiali2022</a> <p class="font-semibold text-xs justify-end">4.5M</p></li>
            <li class="flex flex-row w-full"><a href="#" class="grow">#F1</a><p class="font-semibold text-xs justify-end">2.3M</p></li>
            <li class="flex flex-row "><a href="#" class="grow">#Unibo</a><p class="font-semibold text-xs justify-end">1.2M</p></li>
            <li class="flex flex-row w-full"><a href="#" class="grow">#Calcio</a><p class="font-semibold text-xs justify-end">2.9 M</p></li>
            <li class="flex flex-row "><a href="#" class="grow">#Italy</a><p class="font-semibold text-xs justify-end">10.6 M</p></li>
        </ul>

    </aside>
</body>

</html>