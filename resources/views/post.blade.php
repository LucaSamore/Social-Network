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
    <body class="bg-white">
        <div class="card w-96 bg-base-100 shadow-xl bg-black">

        <div class="flex p-2">
            <!-- Immagine Profilo -->
            <div class="avatar">
                <div class="w-12 rounded-full">
                    <img src="https://placeimg.com/192/192/people" />
                </div>
            </div>

            <h2 class="card-title float-right p-2">@Username</h2>

        </div>

            <figure><img src="https://placeimg.com/400/225/arch" alt="Shoes" /></figure>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec luctus ex. Nunc rutrum molestie euismod.</p>
                <div class="card-actions justify-end">
                
                <div class="flex space-x-1">
                    <button class="btn gap-1 w-1/3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                        
                    </button>
                    <button class="btn gap-1 w-1/3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                        Mi Piace
                    </button>
                    <button class="btn gap-1 w-1/3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                        Mi Piace
                    </button>    
                </div>
                
            </div>
            </div>
        </div>
    </body>
</html>