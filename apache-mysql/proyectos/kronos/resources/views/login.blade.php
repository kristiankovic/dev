<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        .container{
            display: flex;
            flex-direction: column;

            width: 500px
        }
    </style>
</head>

<body>
    <h2>Bienvenido al Login</h2>

    <form method="POST" action="{{ route('login.form') }}">

        @csrf

        <section class="container">

            @csrf

            <label for="email"">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Ingresar</button>

            <label for="">Eres nuevo? <span><a href=" {{ route('register.view') }} ">Registrate aqui</a></span> </label>

        </section>
    </form>
</body>

</html>
