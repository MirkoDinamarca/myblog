@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Todos mis blogs</h2>

    @if (session('success'))
        <div id="success"
            class="text-center my-8 py-3 bg-green-700 font-semibold bg-opacity-50 border rounded-md border-green-800 text-green-500">
            <h3 class="text-lg">
                {{ session('success') }}
            </h3>
        </div>
    @endif

    <section class="container mx-auto my-4 p-2 max-w-7xl  rounded-lg">
        <ul>
            @foreach ($posts as $p)
                <li class="mt-3">
                <a href="{{ route('category.show', ['id' => $p->id]) }}">
                <article class="p-3 rounded-md shadow-md  grid grid-cols-6 gap-3"> <!-- Agregar sombra y bordes redondeados -->
                        <div class="col-span-5 flex gap-3">

                            {{-- Imagen del blog --}}
                            <div id="uploadImage"
                                class="w-80 h-40 rounded-md flex flex-col justify-center items-center cursor-pointer hover:bg-opacity-90 transition-all duration-150">
                                <img src="{{ asset('uploads/blogs/') . '/' . $p->poster }}"
                                    class="rounded-md object-cover w-80 h-40" alt="">
                            </div>

                            <div class="flex flex-col w-full">
                                <h2 class="text-2xl font-bold ">{{ $p->title }}</h2>
                                <small class="font-semibold tracking-wide">Fecha de edición
                                    {{ $p->updated_at->format('d') }} de
                                    {{ $p->updated_at->locale('es')->monthName }}, {{ $p->updated_at->format('Y') }} -
                                    {{ $p->updated_at->format('H:i') }} hs</b></small>

                                <div class="flex justify-between ">
                                <form action="{{ route('profile.change.post', $p->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @if ($p->habilitated)
                                    <button type="submit" class="bg-gray-600 bg-opacity-50 text-white py-1 px-1  rounded-md mt-2 hover:bg-black"><i class="fas fa-lock-open"></i> Publico</button>
                                    
                                    @else
                                    <button type="submit" class="bg-gray-600 bg-opacity-50 text-white py-1 px-1  rounded-md mt-2 hover:bg-black"><i class="fas fa-lock"></i> Privado</button>
                                    @endif
                                </form>
        
                                </div>
                               
                               
                            </div>
                        </div>
                     

                    </article>
                </li>
                </a>
                
            @endforeach
        </ul>

        <div class="mt-6">
            <a href="{{ route('/') }}"
                class="bg-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100">Volver al inicio <i
                    class="fa-solid fa-house"></i></a>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', e => {
            setTimeout(() => {
                if (document.getElementById('success')) {
                    document.getElementById('success').remove()
                }
            }, 3000);
        })
    </script>
@endsection
