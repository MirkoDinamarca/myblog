@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Perfil de {{ $user->name }} {{ $user->lastname }}</h2>

    @if ($user->active)
        <p class="text-center font-bold tracking-wide text-green-500"><em>Usuario activo en el sistema</em></p>
    @else
        <p class="text-center font-bold tracking-wide text-red-500"><em>Usuario inactivo en el sistema</em></p>
    @endif

    <section class="mt-4">
        <form action="{{ route('usuarios.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input value="{{ $user->id }}" name="user_id" hidden>
            <div class=" w-1/2 mx-auto p-5 flex flex-col gap-3 items-center justify-center">
                <div class="w-40 h-40 rounded-full">
                    <img src="{{ asset('images/img_default.jpg') }}" class="rounded-full object-cover w-40 h-40 img_default"
                        alt="">
                </div>
                <span onclick="setFileImg('imagen_perfil')"><i class="fa-regular fa-pen-to-square"></i></span>
                <input type="file" name="imagen_perfil" id="imagen_perfil" onChange="displayImage(this, 'img_default')"
                    hidden>
                {{-- <h4 class="text-xl">{{ auth()->user()->name }}</h4> --}}

                <div class="grid w-full gap-3 grid-cols-3">
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Nombre</label>
                        <input type="text" name="name"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el nombre" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Apellido</label>
                        <input type="text" name="lastname"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el nombre" value="{{ $user->lastname }}">
                        @error('lastname')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Usuario</label>
                        <input type="text" name="username"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el usuario" value="{{ $user->username }}">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="font-semibold tracking-wider">Correo</label>
                        <input type="email" name="email"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el correo" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Cambiar Contraseña</label>
                        <input type="password" name="password"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese la nueva contraseña">
                    </div>
                    <div class="col-span-1">
                        <div>
                            <span>¿El usuario es superadmin?</span>
                            <div class="flex items-center gap-3">
                                <input type="radio" name="superadmin" id="si_superadmin" value="1" class="cursor-pointer"
                                    {{ $user->superadmin ? 'checked' : '' }}>
                                <label for="si_superadmin" class="cursor-pointer">Si</label>
                                <input type="radio" name="superadmin" id="no_superadmin" value="0" class="cursor-pointer"
                                    {{ !$user->superadmin ? 'checked' : '' }}>
                                <label for="no_superadmin" class="cursor-pointer">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div>
                            <span>Estado del usuario</span>
                            <div class="flex items-center gap-3">
                                <input type="radio" name="active" id="activo" value="1" class="cursor-pointer"
                                    {{ $user->active ? 'checked' : '' }}>
                                <label for="activo" class="cursor-pointer">Activo</label>
                                <input type="radio" name="active" id="inactivo" value="0" class="cursor-pointer"
                                    {{ !$user->active ? 'checked' : '' }}>
                                <label for="inactivo" class="cursor-pointer">Inactivo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <em class="tracking-wide">(Recuerde hacer click en 'Editar Usuario' para guardar cualquier cambio
                            realizado)</em>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="bg-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100">Editar
                        Usuario</button>
                </div>

            </div>
        </form>

        <div class="mt-4">
            <a href="{{ route('usuarios') }}"
                class="bg-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100">Volver al histórico</a>
        </div>
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
