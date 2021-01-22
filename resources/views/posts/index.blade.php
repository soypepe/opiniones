@extends('layouts.app')

@section('contenido')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="cuerpo" class="sr-only">Cuerpo</label>
                        <textarea name="cuerpo" id="cuerpo" cols="30" rows="4"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('cuerpo') border-red-500 @enderror"
                        placeholder="Postea algo"></textarea>

                        @error('cuerpo')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ 'Este campo es requerido'}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white
                    px-4 py-2 rounded font-medium">Postear</button>
                </form>
            @endauth
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach

                {{ $posts->links() }}
            @else
                <p>No hay nada</p>
            @endif
        </div>
    </div>
@endsection