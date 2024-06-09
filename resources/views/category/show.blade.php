@extends('layout.app')

@section('contenido')

    <div class="container mx-auto my-8 p-4 max-w-4xl  rounded-lg " >
            
        <div class="poster relative mb-1">
            <img class="w-full h-82 rounded-md object-cover" src="{{ asset('uploads/blogs/' . $post->poster) }}" alt="Poster">
            <div class="titulo absolute bottom-0 left-0 right-0 flex justify-center items-center rounded-b-md" style="background: linear-gradient(to top, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);">
                <p class="  mb-4 text-white text-3xl font-bold uppercase">{{ $post->title }}</p>
                <div class="absolute top-0 right-0 mr-2 mt-2">
                    <a href="{{ route('category.edit', ['id' => $post->id]) }}" class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-edit"></i> Editar </a>
                </div>
            </div>
        </div>
        
        <div class="wrapper mb-3 text-gray-600 text-center" style="display: flex; justify-content: flex-start;">
            <div class="usuario" style="margin-right: 20px;">
                <p class="mt-4 text-gray-500 text-right">Agustina Kilapi</p>
            </div>
            <div class="editado">
                @if($post->updated_at)
                <p class="mt-4 text-gray-500 text-right">Editado: {{ $post->updated_at->format('d/m/Y') }}</p>
                @endif
            </div>
        </div>

        <div class="contenido mb-3" style="text-align: justify; line-height: 1.5; font-family: 'Arial', sans-serif;">
            <p style="font-size: 22px;">{{ $post->content }}</p>
        </div>
            
    </div>

@endsection
