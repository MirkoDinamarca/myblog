@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Vista Categoría</h2>

    <h2>ID del post N°{{ $post->id }} y el titulo es {{ $post->title }}</h2>

    <p>Contenido: {{ $post->content }}</p>
@endsection
