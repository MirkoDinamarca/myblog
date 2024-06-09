@extends('layout.app')

@section('contenido')
    <h2 class="text-4xl font-bold text-center">Editar Blog</h2>

    
    <form action="{{ route('category.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="w-full xl:w-1/2 mx-auto p-5 flex flex-col gap-3 items-center justify-center">
            <div class="grid w-full gap-3 grid-cols-2">
                <div class="col-span-2">
                    <div id="uploadImage" class="relative">
                        <img class="w-full h-52 rounded-md object-cover flex flex-col justify-center items-center cursor-pointer" 
                          src="{{ asset('uploads/blogs/' . $post->poster) }}" alt="Poster">
                          <div class="absolute top-0 right-0 mr-2 mt-2">
                            <button class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Cambiar Imagen </button>
                          </div>
                    </div>
                    <input type="file" name="poster" id="poster" onChange="displayImage(this, 'uploadImage')" hidden>
                        @error('poster')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="col-span-2">
                    <label for="title" class="font-semibold tracking-wider">Título del Blog:</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" 
                    class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300">
                </div>

                <div class="col-span-2">
                    <label class="font-semibold tracking-wider">Descripción:</label>
                    <textarea name="content" id="content" rows="4"  cols="30" rows="5"  maxlength="4000"
                    class="block w-full bg-gray-600 rounded-md border shadow placeholder:text-gray-300">{{ $post->content }}</textarea>
                </div>

        
                <div class="col-span-1">
                    
                    <button type="button" class="bg-white hover:bg-gray-500  hover:text-white text-gray-800 py-2 px-6 font-bold rounded-sm hover:bg-gray-100"
                    onclick="toggleModal()">Actualizar
                    </button>
                </div>
                
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
                            ¿Está seguro que desea editar el blog?
                        </div>
                        <div class="px-4 py-3 text-right" style="background-color: #1d232a; color: #a6adbb">
                            <button type="button" class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-800 mr-2"
                                onclick="toggleModal()">Cancelar</button>
                            <button type="submit" 
                                class="py-2 px-4 bg-gray-200 text-gray-800 rounded font-medium hover:bg-gray-300 mr-2 transition duration-150">
                            Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

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
