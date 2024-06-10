@extends('layout.app')

@section('contenido')
    {{-- <h2 class="text-4xl font-bold text-center">Home</h2> --}}
    <style>

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #d1d5db; /* Tailwind's gray-300 */
        }
        .divider::before {
            margin-right: 0.5em;
        }
        .divider::after {
            margin-left: 0.5em;
        }

        #OverviewText4 {
            position: relative;
        }

        #OverviewText4:before {
            content: "";
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('images/first_blog_bg.jpg') }}") scroll no-repeat 0 0;
            /* background: transparent url("{{ asset('images/first_blog_bg.jpg') }}") scroll no-repeat 0 0; */
            background-size: cover;
            width: 100%;
            height: 300px;
            position: absolute;
            display: block;
            top: 50px;
            left: 50px;
        }

        #bg_image_first_blog {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('images/first_blog_bg.jpg') }}") no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 400px;
            display: flex;
            position: relative;
            padding: 20px
        }
    </style>
    <div id="bg_image_first_blog">

        <article class="bg_color_primary c_black p-10 md:w-2/3 xl:w-2/5">
            <span class="font-semibold text-sm">1min | Blog recomendado</span>
            <h2 class="text-xl md:text-3xl font-bold">Groove, Jazz y Melancolía</h2>

            <p class="text-sm">
                En esta ocasión les traigo tres datas que seguro no conocían a esta bítacora musical del groove internacional. Así de pretencioso como leen. Esta vez vamos por un lado más tranqui pero sin perder el ritmo y con mucho lenguaje jazz de por medio.
                Saben que la movida de jazz y neosoul de Londres siempre capta mi atención porque lograron condensar en las últimas décadas a músicxs con mucho talento, algo del color y la bruma de la ciudad...
            </p>

            <div class="mt-4 flex justify-between items-center text-sm">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-400"></div>
                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Mirko Dinamarca</span>
                        <span>Mayo, 2024</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('category.show', 4) }}"
                        class="bg_color_secondary c_primary p-1 px-3 tracking-wide rounded-sm hover:bg-gray-700 transition-all duration-100">Leer
                        blog <i class="fa-solid fa-location-arrow"></i></a>
                </div>
            </div>
        </article>

    </div>
    <div class="container mx-auto my-4 p-2 max-w-7xl  rounded-lg ">
    <div class="relative my-8">
            <div class="divider">
                <h1 class="text-2xl font-bold text-center">BLOGS MAS RECIENTES</h1>
            </div>
        </div>

    @if($posts->isEmpty())
        <p>No hay blogs en este momento.</p>
    @else
    <div class="flex flex-wrap -mx-1 gap-3">
        @foreach($posts as $post)
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative" style="padding-top: 56.25%;">
                                <img src="{{ asset('uploads/blogs/' . $post->poster) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
                            </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                    <a href="{{ route('category.show', ['id' => $post->id]) }}" class="bg-gray-500 hover:bg-gray-800  hover:text-white text-white py-2 px-6 font-bold rounded-sm">
                    Leer mas</a>
                </div>

            </div>
        @endforeach

    </div>

    @endif
    </div>


@endsection
