@extends('layout.app')

@section('contenido')
    <style>
        th,
        td {
            border: 1px solid rgb(99, 99, 99)
        }

        th {
            padding: 5px;
        }

        td {
            padding: 14px
        }

        thead,
        tbody {
            border: 1px solid rgb(99, 99, 99)
        }
    </style>
    <h2 class="text-4xl font-bold text-center">Usuarios Registrados en el Sistema</h2>
    @if (session('success'))
        <div id="success"
            class="text-center my-8 py-3 bg-green-700 font-semibold bg-opacity-50 border rounded-md border-green-800 text-green-500">
            <h3 class="text-lg">
                ¡Usuario editado correctamente!
            </h3>
        </div>
    @endif
    <section class="flex justify-center mt-7 overflow-x-auto">
        <table class="w-full text-center">
            <thead style="background-color: #1e1e1e;">
                <th>
                    ID
                </th>
                <th>Nombre y Apellido</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>¿Es Superadmin?</th>
                <th>Fecha de creación</th>
                <th>Fecha última edición</th>
                <th>Estado</th>
            </thead>

            <tbody>
                @foreach ($usuarios as $u)
                    <tr style="background-color: #121212">
                        <td>{{ $u->id }}</td>
                        <td>
                            <div class="flex justify-between gap-4">
                                <p class="mb-0">
                                    {{ $u->name }} {{ $u->lastname }}
                                </p>
                                <div class="flex gap-5">
                                    <a href="{{ route('usuarios.show', $u->id) }}"><i class="fa-regular fa-eye"></i></a>
                                    {{-- <a href=""><i class="fa-regular fa-pen-to-square"></i></a> --}}
                                </div>
                            </div>

                        </td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td class="flex justify-center text-center">
                            @if ($u->superadmin)
                                <div
                                    class="bg-green-700 bg-opacity-50 w-7 h-6 flex justify-center items-center text-center text-green-500 font-semibold border border-green-800 rounded-md">
                                    Si
                                </div>
                            @else
                                <div
                                    class="bg-red-700 bg-opacity-50 w-7 h-6 flex justify-center items-center text-center text-red-600 font-semibold border border-red-800 rounded-md">
                                    No
                                </div>
                            @endif
                        </td>
                        <td>{{ $u->created_at->format('d') }} de
                            {{ $u->created_at->locale('es')->monthName }},
                            {{ $u->created_at->format('Y') }} - {{ $u->created_at->format('H:i') }} hs</b></td>
                        <td>{{ $u->updated_at->format('d') }} de
                            {{ $u->updated_at->locale('es')->monthName }},
                            {{ $u->updated_at->format('Y') }} - {{ $u->updated_at->format('H:i') }} hs</b></td>
                        <td class="flex justify-center text-center">
                            @if ($u->active)
                                <div
                                    class="bg-green-700 bg-opacity-50 w-16 h-6 flex justify-center items-center text-center text-green-500 font-semibold border border-green-800 rounded-md">
                                    Activo
                                </div>
                            @else
                                <div
                                    class="bg-red-700 bg-opacity-50 w-16 h-6 flex justify-center items-center text-center text-red-600 font-semibold border border-red-800 rounded-md">
                                    Inactivo
                                </div>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
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
