@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Bienvenido a tu perfil {{ auth()->user()->username }}</h2>

    <section class="mt-4">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" w-1/2 mx-auto p-5 flex flex-col gap-3 items-center justify-center">
                <div class="w-40 h-40 rounded-full">
                    <img src="{{ asset('images/img_default.jpg') }}" class="rounded-full object-cover w-40 h-40 img_default"
                        alt="">
                </div>
                <span onclick="setFileImg('imagen_perfil')"><i class="fa-regular fa-pen-to-square"></i></span>
                <input type="file" name="imagen_perfil" id="imagen_perfil" onChange="displayImage(this, 'img_default')"
                    hidden>
                <h4 class="text-xl">{{ auth()->user()->name }}</h4>

                <div class="grid w-full gap-3 grid-cols-3">
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Nombre</label>
                        <input type="text" name="name"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el nombre" value="{{ auth()->user()->name }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Apellido</label>
                        <input type="text" name="lastname"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el nombre" value="{{ auth()->user()->lastname }}">
                        @error('lastname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Usuario</label>
                        <input type="text" name="username"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el usuario" value="{{ auth()->user()->username }}">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="font-semibold tracking-wider">Correo</label>
                        <input type="email" name="email"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el correo" value="{{ auth()->user()->email }}"">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Contraseña</label>
                        <input type="password" name="password"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese la contraseña">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="bg-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100">Editar
                        Perfil</button>
                </div>

            </div>
        </form>
    </section>

    <!-- Setea la imagen en el file -->
    <script>
        function setFileImg(id) {
            event.preventDefault();
            document.getElementById(id).click();
        }

        function displayImage(e, id_img) {
            if (e.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(`.${id_img}`).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
@endsection
