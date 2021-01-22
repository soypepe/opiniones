@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('usuarios.posts', $post->user) }}" class="font-bold">{{ $post->user->name}}</a>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->cuerpo }}</p>

    <div class="flex items-center">
        @auth
            @if(!$post->leGuto(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Me gusta</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">No me gusta</button>
                </form>
            @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('voto', $post->likes->count()) }}</span>
    </div>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Borrar</button>
        </form>
    @endcan
</div>