<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opiniones</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Inicio</a>
            </li>
            <li>
                <a href="{{ route('panel') }}" class="p-3">Panel de usuario</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Opiniones</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>    
                <li>
                    <form action="{{ route('salir') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Salir</button>
                    </form>
                </li>    
            @endauth
            @guest
                    <li>
                        <a href="{{ route('ingreso') }}" class="p-3">Ingreso</a>
                    </li>
                    <li>
                        <a href={{ route('registro') }} class="p-3">Registro</a>
                    </li>
                @endguest
        </ul>
    </nav>

    @yield('contenido')
</body>
</html>