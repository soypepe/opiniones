@extends('layouts.app')

@section('contenido')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action={{ route('registro') }} method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Nombre</label>
                    <input type="text" name="name" id="name"
                    placeholder="Tu nombre" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg
                    @error('name') border-red-500
                    @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ 'El nombre es obligatorio' }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Usuario</label>
                    <input type="text" name="username" id="username"
                    placeholder="Tu usuario" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg
                    @error('username') border-red-500
                    @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ 'El usuario es obligatorio' }}
                        </div>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="sr-only"
                    >Repita clave</label>
                    <input type="password" name="password_confirmation"
                     id="password_confirmation"
                    placeholder="Repita su clave" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg
                    @error('password_confirmation') border-red-500
                    @enderror" value="">

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white
                px-4 py-3 rounded font-medium w-full">Registrar</button>
            </form>
        </div>
    </div>
@endsection