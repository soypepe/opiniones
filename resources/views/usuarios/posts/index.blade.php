@extends('layouts.app')

@section('contenido')
    <div class="flex justify-center">

        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
            <p>Hizo {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
            y recibio {{ $user->likesRecibidos->count() }} {{ Str::plural('voto',
            $user->likesRecibidos->count()) }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg">
            <div class="w-8/12">
                @if ($posts->count())
                @foreach ($posts as $post)
                <x-post :post="$post"/>
                @endforeach
                
                {{ $posts->links() }}
                @else
                <p>{{ $user->name }} no tiene posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection