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

            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <label for="uploadFile">File:</label><br/>
                <input type="file" id="uploadFile" name="uploadFile" />
                <input type="submit" value="Send" />
            </form>
        </main>
    </body>
</html>