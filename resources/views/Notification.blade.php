<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title></title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white p-4 ">
    
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
    </body>
</html>