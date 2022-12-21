<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Login</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-3xl font-bold underline">
            Login
        </h1>

        <form action="/login" method="post">
            @csrf
            <label for="email">Email:</label><br/>
            <input type="email" id="email" name="email" required /><br/>
            <label for="password">Password:</label><br/>
            <input type="password" id="password" name="password" required />
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>