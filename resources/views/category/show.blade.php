@extends('layout.app')

@section('contenido')

    <h2 class="text-4xl font-bold text-center">Vista Categoría</h2>

    <h2>ID del post N°{{ $post->id }} y el titulo es {{ $post->title }}</h2>
    {{ $post->poster }}
    <p>Contenido: {{ $post->content }}</p>

    @if($post->updated_at)
        <p class="mt-4 text-gray-600">Última edición: {{ $post->updated_at->format('d/m/Y') }}</p>
    @endif

    <a href="{{ route('category.edit', ['id' => $post->id]) }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded focus:outline-none ">
        Editar Post
    </a>




@endsection
