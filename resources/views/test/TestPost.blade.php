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
    <form method="POST" action="/testPostController" enctype="multipart/form-data">
        @csrf
        <input type="text" required name="textual_content"/>
        <input type="file" required name="photoPath"/>
        <input type="submit"/>
    </form>
</body>

</html>