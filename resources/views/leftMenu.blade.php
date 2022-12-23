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
    <aside class="w-1/4 h-screen bg-black text-white">

        <ul class="menu bg-black h-auto card-body justify-center">
            <li class="w-full h-auto p-2">
                <a class="flex w-fit h-fit rounded-full py-2 px-4 hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="basis-1/3 h-8 w-8 mx-2" fill="#000" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <strong>Home</strong>
                </a>
            </li>

            <li class="w-full h-auto p-2">
                <a class="flex w-fit h-fit rounded-full py-2 px-4 hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="basis-1/3 h-8 w-8 mx-2" fill="#000" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <strong>Home</strong>
                </a>
            </li>

            <li class="w-full h-auto p-2 card-actions justify-center">
                <a class="w-fit h-fit rounded-full py-2 px-4 hover:bg-blue-500 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="basis-1/3 h-8 w-8 mx-2" fill="#000" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <strong>Home</strong>
                </a>
            </li>

        </ul>

        <div class="card-actions justify-center">
            <button class="btn btn-primary rounded-full">NEW POST</button>
        </div>

    </aside>
</body>

</html>