@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Editar blog</h2>

    <h2>Editar Post N°: {{ $post->id }}</h2>
    
    <form action="{{ route('category.update', ['id' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Para indicar que estás haciendo una solicitud PUT -->

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título del Post:</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenido del Post:</label>
            <textarea name="content" id="content" rows="4" class="w-full border rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Guardar Cambios
        </button>
    </form>

    <!-- Mostrar la fecha y hora de la última edición -->
   
@endsection
