<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Upload</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @cloudinaryJS
        @vite('resources/css/app.css')
    </head>
    <body>
        <main class="flex justify-center items-center min-h-screen">
            <h1 class="text-3xl">Upload Media</h1>

            <form action="/upload/image" method="post" enctype="multipart/form-data">
                @csrf
                <label for="image">Immagine:</label><br/>
                <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" />
                <input type="submit" value="Send" />
            </form>


            <form action="/upload/video" method="post" enctype="multipart/form-data">
                @csrf
                <label for="video">Video:</label><br/>
                <input type="file" id="video" name="video" accept="video/mp4,video/x-m4v,video/*" />
                <input type="submit" value="Send" />
            </form>
        </main>
    </body>
</html>