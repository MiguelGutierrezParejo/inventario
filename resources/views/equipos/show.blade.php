<x-layout>
    <script defer>
       function showConfirmation(fotoId) {
        if (confirm("¿Seguro que deseas eliminar esta imagen?")) {
            fetch(`/inventario/public/fotos/${fotoId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                location.reload();
            });
        }
    }
    </script>
    <table style="float: left">
        @foreach ($fotos as $foto)
            @if ($foto->IdEquipo == $equipo->Id)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . basename($foto->Foto)) }}"
                            width="280px"
                            style="padding-bottom: 10px"
                            title="Doble clic para borrar esta imagen"
                            ondblclick="showConfirmation({{ $foto->Id }})">
                        <form action="{{ route('fotoequipos.destroy', ['fotoId' => $foto->Id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del equipo</strong>
            <a href="{{ route('fotoequipos.create', ['id' => $equipo->Id]) }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir foto</a>
            <a href="/inventario/public/equipos/edit/{{ $equipo->Id }}" style="background-color: #0053D0" class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1">Editar</a>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Número de inventario:
            <span class="font-thin">{{ $equipo->NInventario }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Tipo:
            <span class="font-thin">{{ $equipo->tipo->Denominacion }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Nombre del ordenador:
            <span class="font-thin">{{ $equipo->NombreOrdenador }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Modelo:
            <span class="font-thin">{{ $equipo->Modelo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Nº Serie:
            <span class="font-thin">{{ $equipo->NumSerie }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Alta:
            <span class="font-thin">{{ $equipo->FechaAlta->format('d-m-Y') }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Baja:
            @if ($equipo->FechaBaja)
            <span class="font-thin">{{ $equipo->FechaBaja->format('d-m-Y') }}</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Precio de adquisición:
            <span class="font-thin">{{ number_format($equipo->PrecioAdquisicion, 2, ',', '.')}}€</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $equipo->Observaciones }}</span>
        </h3>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Asignaciones</strong>
            <a href="/inventario/public/relequip/create/{{ $equipo->Id }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar
            </a>
        </div>
        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-4/12 bg-gray-300 text-left px-2">Empleado</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>
                    <td class="bg-gray-300 text-left px-2"></td>
                    <td class="bg-gray-300 text-left px-2"></td>

                </tr>
            </thead>
            <tbody>
                @foreach ($relacion as $rel )
                <tr class="border border-black">
                    <td class="text-left px-2 border border-black"><a href="/inventario/public/usuarios/{{$rel->IdUsuario}}">{{ $rel->usuario->Nombre}}</a></td>
                    <td class="px-2 border border-black">{{ $rel->FechaAlta->format('d-m-Y')}}</td>

                    <td class="px-2 border border-black">@if ($rel->FechaBaja)
                        {{$rel->FechaBaja->format('d-m-Y')}}
                        @endif
                    </td>
                    <td class="px-2 border border-black">{{ $rel->Observaciones}}</td>
                    <td class="px-2">
                        <a href="/inventario/public/relequip/edit/{{ $rel->Id }}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="/inventario/public/relequip/{{ $rel->Id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Está seguro de borrar esta asignación?')" type="submit">
                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Mantenimiento</strong>
            <a href="/inventario/public/mantequip/create/{{ $equipo->Id }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
            </a>
        </div>
        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-6/12 bg-gray-300 text-left px-2">Elemento</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Características</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Fabricante</th>
                    <td class="bg-gray-300 text-left px-2"></td>
                    <td class="bg-gray-300 text-left px-2"></td>

                </tr>
            </thead>
            <tbody>
                @foreach ($mantenimiento as $mant )
                @if ($mant->FechaBaja)
                <tr class="">
                    <td class="text-gray-400 text-left px-2 border border-black">{{ $mant->Nombre}}</td>
                    <td class="text-gray-400 px-2 border border-black">{{ $mant->Fabricante}}</td>
                    <td class="text-gray-400 px-2 border border-black">{{ $mant->Caracteristicas}}</td>
                    <td class="px-2">
                        <a href="/inventario/public/mantequip/edit/{{ $mant->Id }}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="/inventario/public/mantequip/baja/{{ $mant->Id }}" method="GET">
                            @csrf
                            @method('GET')
                            <abbr title="Dar de baja mantenimiento">
                                <button onclick="return confirm('¿Está seguro que desea dar de baja este componente?')" type="submit">
                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </abbr>
                        </form>
                    </td>
                </tr>
                @else
                <tr class="">
                    <td class="text-left px-2 border border-black">{{ $mant->Nombre}}</td>
                    <td class="px-2 border border-black">{{ $mant->Caracteristicas}}</td>
                    <td class="px-2 border border-black">{{ $mant->Fabricante}}</td>
                    <td class="px-2">
                        <a href="/inventario/public/mantequip/edit/{{ $mant->Id }}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="/inventario/public/mantequip/baja/{{ $mant->Id }}" method="GET">
                            @csrf
                            @method('GET')
                            <abbr title="Dar de baja mantenimiento">
                                <button onclick="return confirm('¿Está seguro que desea dar de baja este componente?')" type="submit">
                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </abbr>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Historial de software</strong>
            <a href="/inventario/public/relacionequipossoftwares/createdesdeequipo/{{$equipo->Id}}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
            </a>
        </div>
        <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-4/12 bg-gray-300 text-left px-2">Nombre</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                    <th class="w-3/12 bg-gray-300 text-left px-2">Observaciones</th>
                    <th class="w-1/12 bg-gray-300 text-left px-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipo->relacionesequipos as $relacion)
                <tr class="border border-black">
                    <td class="text-left px-2 border border-black">
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ $relacion->software->Nombre}}</a>
                    </td>
                    <td class="px-2 border border-black">
                    @if ($relacion->FechaBaja == null)
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}"></a>
                        @else
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ date('d-m-Y', strtotime($relacion->FechaAlta)) }}</a>
                        @endif
                    </td>
                    <td class="px-2 border border-black">
                        @if ($relacion->FechaBaja == null)
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}"></a>
                        @else
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ date('d-m-Y', strtotime($relacion->FechaBaja)) }}</a>
                        @endif
                    </td>
                    <td class="px-2 border border-black">
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ $relacion->Observaciones}}</a>
                    </td>
                    <td class="flex justify-center">
                        <form action="/inventario/public/relacionequipossoftwares/{{ $relacion->Id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Está seguro de borrar esta asignación?')" type="submit">
                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Documentos</strong>
            <a href="/inventario/public/docum/create/{{ $equipo->tipo->Denominacion }}/{{ $equipo->Id }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
            </a>
        </div>
        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-6/12 bg-gray-300 text-left px-2">Nombre</th>
                    <th class="w-6/12 bg-gray-300 text-left px-2">Observaciones</th>
                    <th class="bg-gray-300 text-left px-2"></th>
                    <th class="bg-gray-300 text-left px-2"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $doc )
                <tr class="border border-black">
                    <td class="text-left px-2 border border-black"><a href="{{$doc->Fichero}}" target="_blank">{{ $doc->Nombre}}</a></td>
                    <td class="px-2 border border-black">{{ $doc->Observaciones}}</td>
                    <td class="px-2">
                        <a href="/inventario/public/docum/edit/{{ $doc->Id }}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="/inventario/public/docum/{{ $doc->Id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Está seguro de borrar este documento?')" type="submit">
                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/" style="background-color: #0053D0" class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>

</x-layout>
