<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
    <div class="flex justify-between">
            <strong class="text-2xl">Datos del Empleado</strong>
            <a href="/inventario/public/usuarios/edit/{{ $usuario->Id }}" style="background-color: #0053D0"
                class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1">Editar</a>
    </div>

    <div class="flex border-separate border-t">
        <table>
            @foreach ($terminales as $terminal)
                <tr>
                    <td>
                        <h3 class="mb-2 pt-3 font-semibold">Equipo:
                            @if ($equipo)
                            <a href="/inventario/public/equipos/{{$equipo->IdEquipo}}"><span class="font-thin">{{ $equipo->equipo->Modelo }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                            @endif
                        </h3>
                    </td>
                    <td>
                        <h3 class="mb-2 pt-3 font-semibold">Terminal:
                            @if ($terminal)
                            <a href="/inventario/public/terminales/{{$terminal->IdTerminal}}"><span class="font-thin">{{ $terminal->terminal->Modelo }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                            @endif
                        </h3>
                    </td>
                    <td>
                        <h3 class="mb-2 pt-3 font-semibold">Número:
                            @if ($linea)
                            <a href="/inventario/public/lineas/{{$linea->IdLinea}}"><span class="font-thin">{{ $linea->linea->Numero }}</span></a>
                            @endif
                        </h3>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Nombre:
            <span class="font-thin">{{ $usuario->Nombre }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Usuario:
            <span class="font-thin">{{ $usuario->Usuario }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Departamento:
            <span class="font-thin">{{ $usuario->Departamento }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha Alta:
            <span class="font-thin">{{ $usuario->FechaAlta->format('d-m-Y') }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha Baja:
            @if ($usuario->FechaBaja)
            <span class="font-thin">{{ $usuario->FechaBaja->format('d-m-Y') }}</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $usuario->Observaciones }}</span>
        </h3>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <strong class="text-2xl">Historial de Equipos</strong>
            <table class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-2/12 bg-gray-300 text-left px-2">Equipo</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones (de la asignación)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relacionpc as $rel )
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/equipos/{{$rel->IdEquipo}}">{{ $rel->equipo->NombreOrdenador}}</a></td>

                        <td class="px-2 border border-black">{{ $rel->FechaAlta->format('d-m-Y')}}</td>

                        <td class="px-2 border border-black">@if ($rel->FechaBaja)
                                                                {{$rel->FechaBaja->format('d-m-Y')}}
                                                             @endif
                        </td>
                        <td class="px-2 border border-black">{{ $rel->Observaciones}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Historial de software</strong>
            <a href="/inventario/public/relacionusuariossoftwares/createdesdeuser/{{$usuario->Id}}"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
            </a>
        </div>
        <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-3/12 bg-gray-300 text-left px-2">Nombre</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones (de la asignación)</th>
                    <td class="bg-gray-300 text-left px-2"></td>
                    <td class="bg-gray-300 text-left px-2"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario->relaciones as $relacion)
                <tr class="border border-black">
                    <td class="text-left px-2 border border-black">
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ $relacion->software->Nombre}}</a>
                    </td>
                    <td class="px-2 border border-black">
                        <a href="/inventario/public/softwares/{{$relacion->software->Id}}">{{ date('d-m-Y', strtotime($relacion->FechaAlta)) }}</a>
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
                    <td class="px-2">
                        <a href="/inventario/public/relacionusuariossoftwares/edit/{{$relacion->Id}}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <form action="/inventario/public/relacionusuariossoftwares/{{ $relacion->Id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Está seguro de borrar esta asignación?')" type="submit">
                                <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
        <strong class="text-2xl">Historial de Terminales</strong>
            <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-3/12 bg-gray-300 text-left px-2">Terminal</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relaciontlf as $rel )
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/terminales/{{$rel->IdTerminal}}">{{ $rel->terminal->Modelo}}</a></td>
                        <td class="px-2 border border-black">{{ $rel->FechaAlta->format('d-m-Y')}}</td>
                        <td class="px-2 border border-black">@if ($rel->FechaBaja)
                                                                {{$rel->FechaBaja->format('d-m-Y')}}
                                                             @endif
                        </td>
                        <td class="px-2 border border-black">{{ $rel->Observaciones}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <strong class="text-2xl">Historial de Lineas</strong>
            <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-2/12 bg-gray-300 text-left px-2">Número</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Extensión</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relacionum as $rel )
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/lineas/{{$rel->IdLinea}}">{{ $rel->linea->Numero}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/lineas/{{$rel->IdLinea}}">{{ $rel->linea->Extension}}</a>
                        </td>
                        <td class="px-2 border border-black">{{ $rel->FechaAlta->format('d-m-Y')}}</td>
                        <td class="px-2 border border-black">@if ($rel->FechaBaja)
                                                                {{$rel->FechaBaja->format('d-m-Y')}}
                                                             @endif
                        </td>
                        <td class="px-2 border border-black">{{ $rel->Observaciones}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <strong class="text-2xl">Historial de Impresoras</strong>
            <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-1/12 bg-gray-300 text-left px-2">Marca</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Modelo</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2">Fecha de alta</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2">Fecha de baja</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->Impresoras->sortBy('FechaBaja') as $impresora )
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/impresoras/{{$impresora->Id}}">{{ $impresora->modelo->Marca}}</a></td>
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/impresoras/{{$impresora->Id}}">{{ $impresora->modelo->Modelo}}</a></td>
                        <td class="px-2 border border-black">{{ date('d-m-Y' , strtotime($impresora->FechaAlta)) }}</td>
                        <td class="text-left px-2 border border-black">
                            @if ($impresora->FechaBaja)
                                <a href="/inventario/public/impresoras/{{$impresora->Id}}">{{ date('d-m-Y' , strtotime($impresora->FechaBaja)) }}</a>
                            @else
                                <a href="/inventario/public/impresoras/{{$impresora->Id}}"></a>
                            @endif
                        </td>
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/impresoras/{{$impresora->Id}}">{{ $impresora->Observaciones}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Documentos</strong>
            <a href="/inventario/public/docum/create/Empleado/{{ $usuario->Id }}"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
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
                                <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <form action="/inventario/public/docum/{{ $doc->Id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Está seguro de borra este documento?')" type="submit">
                                    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
        <a href="/inventario/public/usuarios" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>
</x-layout>
