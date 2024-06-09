@extends('layout.app')

@section('contenido')
    {{-- <h2 class="text-4xl font-bold text-center">Home</h2> --}}
    <style>
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
        @foreach($posts as $post)
        <article class="bg_color_primary c_black p-10 md:w-2/3 xl:w-2/5">
            <span class="font-semibold text-sm">2min | Blog recomendado</span>
            <h2 class="text-xl md:text-3xl font-bold">{{ $post->title }}</h2>

            <p class="text-sm">{{ $post->content }}</p>

            <div class="mt-4 flex justify-between items-center text-sm">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-400"></div>
                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <span>{{ $post->created_at->format('F, Y') }}</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('posts.show', $post->id) }}"
                        class="bg_color_secondary c_primary p-1 px-3 tracking-wide rounded-sm hover:bg-gray-700 transition-all duration-100">
                        Leer blog <i class="fa-solid fa-location-arrow"></i>
                    </a>
                </div>
            </div>
        </article>
        @endforeach

        {{-- <img src="{{ asset('images/first_blog_bg.jpg') }}" alt="First Blog Image"> --}}
    </div>
@endsection