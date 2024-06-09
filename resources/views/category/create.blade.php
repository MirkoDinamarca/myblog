@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Crear Nuevo Blog</h2>
    <section class="mt-4">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full xl:w-1/2 mx-auto p-5 flex flex-col gap-3 items-center justify-center">
                <div class="grid w-full gap-3 grid-cols-2">
                    <div class="col-span-2">
                        <div id="uploadImage"
                            class="w-full h-52 bg-gray-700 rounded-md flex flex-col justify-center items-center cursor-pointer hover:bg-opacity-90 transition-all duration-150">
                            <i class="fa-solid fa-upload text-4xl text-gray-400"></i>
                            <p class="mt-3"><b>Haga click</b> para cargar una imágen</p>
                        </div>

                        <input type="file" name="poster" id="poster" onChange="displayImage(this, 'uploadImage')"
                            hidden>
                        @error('poster')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold tracking-wider">Título del Blog</label>
                        <input type="text" name="title"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            placeholder="Ingrese el título que va a tener el blog">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Quien lo carga</label>
                        <input type="text"
                            class="block w-full bg-gray-600 rounded-xl border shadow placeholder:text-gray-300"
                            value="{{ auth()->user()->name }} {{ auth()->user()->lastname }}" disabled>

                    </div>
                    <div class="col-span-1">
                        <label class="font-semibold tracking-wider">Fecha de creación</label>
                        <input type="date"
                            class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300"
                            value="{{ date('Y-m-d') }}" disabled>
                    </div>
                    <div class="col-span-2">
                        <label class="font-semibold tracking-wider">Descripción</label>
                        <textarea class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300" name="content"
                            cols="30" rows="5" placeholder="Ingrese una descripción del blog"></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="button" class="bg-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100"
                        onclick="toggleModal()">Crear Blog</button>
                </div>
            </div>

            {{-- Modal de confirmación de carga --}}
            <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
                <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-600 opacity-30" />
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                    <div style
                        class="inline-block align-center  rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 font-semibold"
                            style="background-color: #1d232a; color: #a6adbb">
                            ¿Está seguro de crear el blog?
                        </div>
                        <div class="px-4 py-3 text-right" style="background-color: #1d232a; color: #a6adbb">
                            <button type="button" class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-800 mr-2"
                                onclick="toggleModal()"><i class="fas fa-times"></i> Cancelar</button>
                            <button type="submit"
                                class="py-2 px-4 bg-gray-200 text-gray-800 rounded font-medium hover:bg-gray-300 mr-2 transition duration-150"><i
                                    class="fas fa-plus"></i> Crear</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </section>

    <script>
        function toggleModal() {
            event.preventDefault();
            document.getElementById('modal').classList.toggle('hidden')
        }
    </script>

    <script>
        const uploadImg = document.getElementById('uploadImage')

        const _uploadImg = () => {
            setFileImg('poster')
        }

        uploadImg.addEventListener('click', _uploadImg)
    </script>

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
                    let img = document.createElement('IMG')
                    img.src = e.target.result
                    img.classList.add('object-cover', 'w-full', 'h-52', 'rounded-md')
                    document.getElementById('uploadImage').innerHTML = ''
                    document.getElementById('uploadImage').appendChild(img)
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
@endsection
