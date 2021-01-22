@extends('layouts.app')

@section('contenido')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action={{ route('ingreso') }} method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Correo</label>
                    <input type="email" name="email" id="email"
                    placeholder="Tu correo" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg
                    @error('email') border-red-500
                    @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ 'El correo es obligatorio'}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Clave</label>
                    <input type="password" name="password" id="password"
                    placeholder="Tu clave" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg
                    @error('password') border-red-500
                    @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Recordame</label>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white
                px-4 py-3 rounded font-medium w-full">Entrar</button>
            </form>
        </div>
    </div>
@endsection