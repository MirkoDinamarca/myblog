@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Categorías</h2>

    @foreach ($posts as $post)
        <h4>{{ $post->title }}</h4>
    @endforeach

@endsection
