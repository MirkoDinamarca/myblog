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

    <section class="mt-5">
        <ul>
            @foreach ($posts as $p)
                <li class="mt-3">
                    <article class="bg-gray-700 p-3 rounded-md grid grid-cols-6 gap-3">
                        <div class="col-span-5 flex gap-3">

                            {{-- Imagen del blog --}}
                            <div id="uploadImage"
                                class="w-80 h-40 rounded-md flex flex-col justify-center items-center cursor-pointer hover:bg-opacity-90 transition-all duration-150">
                                <img src="{{ asset('uploads/blogs/') . '/' . $p->poster }}"
                                    class="rounded-md object-cover w-80 h-40" alt="">
                            </div>

                            <div class="flex flex-col w-full">
                                <h2 class="text-2xl">{{ $p->title }}</h2>
                                <small class="font-semibold tracking-wide">Fecha de edición
                                    {{ $p->updated_at->format('d') }} de
                                    {{ $p->updated_at->locale('es')->monthName }}, {{ $p->updated_at->format('Y') }} -
                                    {{ $p->updated_at->format('H:i') }} hs</b></small>

                                <div class="flex justify-between border-b border-gray-600 pb-2">
                                    <label class="mt-2 font-semibold tracking-wide">Descripción del blog</label>
                                    @if ($p->habilitated)
                                        <label class="mt-2 tracking-wide text-green-400"><em>Blog habilitado</em></label>
                                    @else
                                        <label class="mt-2 tracking-wide text-red-400"><em>Blog inhabilitado</em></label>
                                    @endif
                                </div>
                                <textarea rows="2" class="bg-transparent border-none focus:outline-none focus:ring-0 focus:border-none" readonly>{{ $p->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-span-1">

                            {{-- Acciones --}}
                            <div class="">
                                <a href="{{ route('category.show', $p->id) }} "
                                    class="bg-white text-gray-800 py-1 px-3 font-bold rounded-sm hover:bg-gray-100">Ver blog
                                    completo</a>
                                <form action="{{ route('profile.change.post', $p->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @if ($p->habilitated)
                                    <button type="submit" class="bg-red-600 bg-opacity-50 text-white py-1 px-3 font-bold rounded-sm mt-3 hover:bg-red-700">Inhabilitar blog</button>
                                    @else
                                    <button type="submit" class="bg-green-600 bg-opacity-50 text-white py-1 px-3 font-bold rounded-sm mt-3 hover:bg-green-700">Habilitar blog</button>
                                    @endif
                                </form>
                            </div>
                        </div>

                    </article>
                </li>

                <hr class="my-3 border border-gray-400">
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
