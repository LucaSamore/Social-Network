<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Register</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-3xl font-bold underline">Register Page</h1>

        <form action="/register" method="post">
            @csrf
            <label for="name">Nome:</label><br/>
            <input type="text" id="name" name="name" required /><br/>

            <label for="surname">Cognome:</label><br/>
            <input type="text" id="surname" name="surname" required /><br/>

            <label for="username">Username:</label><br/>
            <input type="text" id="username" name="username" required /><br/>

            <label for="date_of_birth">Data di nascita:</label><br/>
            <input type="date" id="date_of_birth" name="date_of_birth" required /><br/>

            <label for="email">Email:</label><br/>
            <input type="email" id="email" name="email" required /><br/>

            <label for="password">Password:</label><br/>
            <input type="password" id="password" name="password" required />

            <input type="submit" value="Submit"/>

            @error('error')
                <p>{{ $message }}</p>
            @enderror
        </form>
    </body>
</html>