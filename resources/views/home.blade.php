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
            <span class="font-semibold text-sm">2min | Blog recomendado</span>
            <h2 class="text-xl md:text-3xl font-bold">Groove, Jazz y Melancolía</h2>

            <p class="text-sm">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste dolorum architecto quo vel voluptatem
                recusandae impedit fugiat perferendis repellat dicta? Autem repellendus eos laudantium libero at, inventore
                recusandae quae optio ex corrupti iste magnam corporis expedita et obcaecati, consequuntur enim maxime hic
                dolores magni, nostrum provident earum? Necessitatibus, iusto sunt!
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
                    <a href=""
                        class="bg_color_secondary c_primary p-1 px-3 tracking-wide rounded-sm hover:bg-gray-700 transition-all duration-100">Leer
                        blog <i class="fa-solid fa-location-arrow"></i></a>
                </div>
            </div>
        </article>

        {{-- <img src="{{ asset('images/first_blog_bg.jpg') }}" alt="First Blog Image"> --}}
    </div>

    {{-- //CONSULTAR ESTO, para ver posts --}}
    {{-- @foreach($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <img src="{{ $post->poster }}" alt="{{ $post->title }}" style="width:200px;">
            </li>
        @endforeach 
        
    PARA CREAR POSTS!!! VALIDANDO METODO STORE EN CONTROLADOR   
    <h1>Create Post</h1>

    @if ($errors->any())
        <div>
            <strong>Rechazado</strong> Surgieron algunos problemas con la información.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titulo:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="poster">Creador URL:</label>
            <input type="text" name="poster" id="poster" required>
        </div>
        <div>
            <label for="habilitated">Habilitado:</label>
            <select name="habilitated" id="habilitated" required>
                <option value="1">Visible</option>
                <option value="0">No visible</option>
            </select>
        </div>
        <div>
            <label for="content">Contenido:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">Crear</button>
    </form>
        
        --}}



    {{--
        Contenido donde se van a mostrar los blogs
        Se puede descomentar, pero aún está en desarrollo
    --}}
    {{-- <section class="grid gap-5 grid-cols-4 mt-24">
        <article class="col-span-1 flex flex-col justify-center">
            <img src="{{ asset('images/blog_1.jpeg') }}" class="rounded-t-2xl rounded-r-2xl">
            <div class="mt-5 flex justify-between items-center">
                <span><i class="fa-regular fa-clock"></i> 15 minutos de lectura</span>
                <span><i class="fa-regular fa-thumbs-up"></i> Recomendado</span>
            </div>

            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Nemo mollitia eius vitae maiores consequuntur
                incidunt, reprehenderit quaerat eaque officia labore!
            </div>

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-400"></div>
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Mirko Dinamarca</span>
                    <span>Mayo, 2024</span>
                </div>
            </div>
        </article>
        <article class="col-span-1 flex justify-center">
            <img src="{{ asset('images/blog_1.jpeg') }}" class="rounded-t-2xl rounded-r-2xl">
        </article>
        <article class="col-span-1 flex justify-center">
            <img src="{{ asset('images/blog_1.jpeg') }}" class="rounded-t-2xl rounded-r-2xl">
        </article>
        <article class="col-span-1 flex justify-center">
            <img src="{{ asset('images/blog_1.jpeg') }}" class="rounded-t-2xl rounded-r-2xl">
        </article>
    </section> --}}


    <div class="container mx-auto my-4 p-2 max-w-7xl  rounded-lg ">
    <div class="relative my-8">
            <div class="divider">
                <h1 class="text-2xl font-bold text-center">BLOGS MAS RECIENTES</h1>
            </div>
        </div>

    @if($posts->isEmpty())
        <p>No hay blogs en este momento.</p>
    @else
    <div class="flex flex-wrap -mx-1">
        @foreach($posts as $post)
            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative" style="padding-top: 56.25%;"> 
                                <img src="{{ asset('uploads/blogs/' . $post->poster) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
                            </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($post->content, 100, '...') }}</p>
                    <a href="{{ route('category.show', ['id' => $post->id]) }}" class="bg-gray-500 hover:bg-gray-800  hover:text-white text-white py-2 px-6 font-bold rounded-sm hover:bg-gray-100">
                    Leer mas</a>
                </div>
            
            </div>
        @endforeach
        
    </div>
       
    @endif
    </div>


@endsection
