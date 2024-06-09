<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Notas & Letras</title>

</head>

<body class="container mx-auto bg-mod relative min-h-screen">
    <header>
        <nav class="flex flex-col xl:flex-row gap-3 justify-center items-center">
            <article class="flex-1 p-1">
                <a href="{{ route('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" class="w-10/12 xl:w-1/5" alt="Notas & Letras Logo">
                </a>
            </article>
            <article class="p-5 flex justify-end">
                <ul class="flex xl:flex-row flex-wrap xl:flex-nowrap items-center gap-5 justify-center text-center">
                    @auth
                        <li class="cursor-pointer w-full xl:me-10">
                            <a href="{{ route('category.create') }}"
                                class="border px-2 py-1 rounded hover:bg-gray-600 bg-opacity-90 transition-all duration-150"><i
                                    class="fa-solid fa-plus"></i> Crear un nuevo blog</a>
                        </li>
                    @endauth
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">
                        <i class="fa-brands fa-facebook-f"></i>
                    </li>
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">
                        <i class="fa-brands fa-x-twitter"></i>
                    </li>
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">
                        <i class="fa-brands fa-instagram"></i>
                    </li>
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">

                        <i class="fa-brands fa-tiktok"></i>
                    </li>
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">

                        <i class="fa-brands fa-spotify"></i>
                    </li>
                    <li class="cursor-pointer hover:scale-125 transition-transform duration-150">

                        <i class="fa-brands fa-youtube"></i>
                    </li>

                    <li class="relative ms-5">
                        @auth()
                            <a id="user_perfil"
                                class="inline-flex justify-center items-center cursor-pointer bg-gray-100 bg-opacity-20 w-60 p-2 font-semibold rounded-sm">
                                ¡Bienvenido/da {{ auth()->user()->name }}! <i class="fa-solid fa-angle-down ms-2"></i>
                            </a>
                            <div id="panel_user"
                                class="absolute hidden bg-mod p-3 z-10 mt-2 right-0 border rounded border-gray-600 w-60 text-sm">
                                <ul class="flex flex-col gap-2">
                                    <li
                                        class="py-1 px-2 hover:bg-gray-500 transition-all duration-100 cursor-pointer text-left">
                                        <a href="{{ route('profile.show') }}" class="block"><i
                                                class="fa-regular fa-user"></i> Mi Perfil</a>
                                    </li>
                                    @if (auth()->user()->superadmin)
                                        <li
                                            class="py-1 px-2 hover:bg-gray-500 transition-all duration-100 cursor-pointer text-left">
                                            <a href="{{ route('usuarios') }}" class="block"><i
                                                    class="fa-solid fa-users"></i> Usuarios</a>
                                        </li>
                                    @endif
                                    <li
                                        class="py-1 px-2 hover:bg-gray-500 transition-all duration-100 cursor-pointer text-left">
                                        <a href="#"><i class="fa-solid fa-clipboard-list"></i> Mis Blogs</a>
                                    </li>
                                    <li
                                        class="py-1 px-2 hover:bg-gray-500 transition-all duration-100 cursor-pointer text-left">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="block"><i class="fa-solid fa-power-off"></i>
                                                Cerrar Sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="w-8 h-8 flex justify-center items-center rounded-full cursor-pointer">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        @endauth
                    </li>
                </ul>
            </article>
        </nav>
    </header>

    <main  style="margin-bottom: 50px;">
        @yield('contenido')
    </main>

    <footer class="absolute container bottom-0 py-3 text-center font-semibold tracking-wider" >
        © Todos los derechos reservados - 2024
    </footer>
</body>

</html>

<script>
    const user_perfil = document.getElementById('user_perfil');
    const panel_user = document.getElementById('panel_user');
    user_perfil.addEventListener('click', e => {
        // e.preventDefault();

        if (panel_user.classList.contains('hidden')) {
            panel_user.classList.add('block')
            panel_user.classList.remove('hidden')
            user_perfil.classList.add('bg-gray-600')
        } else {
            user_perfil.classList.remove('bg-gray-600')
            panel_user.classList.add('hidden')
            panel_user.classList.remove('block')
        }
    });

    window.addEventListener('click', e => {
        // e.preventDefault();
        if (!user_perfil.contains(e.target) && !panel_user.contains(e.target)) {
            user_perfil.classList.remove('bg-gray-600');
            panel_user.classList.add('hidden');
            panel_user.classList.remove('block');
        }
    })
</script>
