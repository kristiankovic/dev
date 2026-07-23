<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <style>
        .container{
            display: flex;
            flex-direction: column;

            width: 500px
        }
    </style>
</head>

<body>
    <h2>Bienvenido al Register</h2>

    <form method="POST" action="{{ route('register.form') }}">

        @csrf

        <section class="container">

            @csrf

            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">

            <label for="email"">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Guardar</button>

        </section>
    </form>
</body>

</html>
