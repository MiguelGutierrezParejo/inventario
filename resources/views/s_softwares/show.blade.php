<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del software</strong>
            <div>
                <a href="/inventario/public/softwares/edit/{{$software->Id}}" 
                    style="border-color:#0053D0; background-color: #0053D0" class="text-white bg-blue-700 font-semibold rounded-lg text-sm px-5 py-1 mr-2 text-center">Editar</a>
            </div>
        </div>

        
        <h3 class="border-t mb-2 pt-3 font-semibold">Nombre:
            <span class="font-thin">{{ $software->Nombre }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Proveedor:
            <span class="font-thin">{{ $software->proveedor->Nombre }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Cantidad:
            <span class="font-thin">{{ $software->Cantidad }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Asignados:
            <span class="font-thin">{{ $software->relaciones->count() + $software->relacionesequipos->count() }}</span>
        </h3>
        
        <h3 class="border-t mb-2 pt-3 font-semibold">Tipo:
            <span class="font-thin">{{ $software->Tipo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Alta:
            <span class="font-thin">{{ date('d-m-Y', strtotime($software->FechaAlta)) }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Baja:
            @if ($software->FechaBaja == null) 
                <span></span>
            @else
                <span class="font-thin">{{ date('d-m-Y', strtotime($software->FechaBaja)) }}</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Precio de Adquisición:
            <span class="font-thin">{{ $software->PrecioAdquisicion }} €</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Alta:
            @if ($software->Alta == 0)
                <span class="font-thin">Alta</span>
            @else 
                <span class="font-thin">Baja</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $software->Observaciones }}</span>
        </h3>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Usuarios asignados ({{$software->relaciones->count()}})</strong>

            @if ($software->Cantidad > $software->relaciones->count() + $software->relacionesequipos->count())
                <a href="/inventario/public/relacionusuariossoftwares/create/{{$software->Id}}" 
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar</a>
            @else 
                <p class="text-red-500">Este software ya tiene todas las licencias asignadas</p>
                <a href="/inventario/public/relacionusuariossoftwares/create/{{$software->Id}}" 
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar</a>
            @endif

        </div>
        <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-4/12 bg-gray-300 text-left px-2">Nombre</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Usuario</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Departamento</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($software->relaciones as $relacion)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/usuarios/{{$relacion->usuario->Id}}">{{$relacion->usuario->Nombre}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/usuarios/{{$relacion->usuario->Id}}">{{$relacion->usuario->Usuario}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/usuarios/{{$relacion->usuario->Id}}">{{$relacion->usuario->Departamento}}</a>
                        </td>
                        <td class="flex justify-center">
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
        <div class="flex justify-between">
            <strong class="text-2xl">Equipos asignados ({{$software->relacionesequipos->count()}})</strong>

            @if ($software->Cantidad > $software->relaciones->count() + $software->relacionesequipos->count())
                <a href="/inventario/public/relacionequipossoftwares/create/{{$software->Id}}" 
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar</a>
            @else 
                <p class="text-red-500">Este software ya tiene todas las licencias asignadas</p>
                <a href="/inventario/public/relacionequipossoftwares/create/{{$software->Id}}" 
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar</a>
            @endif

        </div>
        <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-4/12 bg-gray-300 text-left px-2">Nombre</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Usuario</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($software->relacionesequipos as $relacionequipo)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/equipos/{{$relacionequipo->equipo->Id}}">{{$relacionequipo->equipo->NombreOrdenador}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="/inventario/public/usuarios/{{$relacionequipo->equipo->relaciones->where('FechaBaja', null)->first()->usuario->Id}}">
                            {{$relacionequipo->equipo->relaciones->where('FechaBaja', null)->first()->usuario->Nombre }}
                            </a>
                        </td>
                        <td class="flex justify-center">
                            <form action="/inventario/public/relacionequipossoftwares/{{ $relacionequipo->Id }}" method="POST">
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
        <div class="flex justify-between">
            <strong class="text-2xl">Documentos asignados ({{$documentos->count()}})</strong>
            <a href="/inventario/public/docum/create/{{'Software'}}/{{$software->Id}}" 
                class="text-white bg-green-700 font-semibold rounded-lg text-sm px-5 py-1 mr-2 text-center">Añadir documento</a>
        </div>
            <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-4/12 bg-gray-300 text-left px-2">Nombre</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Fecha</th>
                        <th class="w-6/12 bg-gray-300 text-left px-2">Observaciones</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2"></th>
                        <th class="w-1/12 bg-gray-300 text-left px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $documento)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black">
                            <a href="{{$documento->Fichero}}">{{$documento->Nombre}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="{{$documento->Fichero}}">{{date('d-m-Y', strtotime($documento->created_at))}}</a>
                        </td>
                        <td class="text-left px-2 border border-black">
                            <a href="{{$documento->Fichero}}">{{$documento->Observaciones}}</a>
                        </td>
                        <td class="px-6"> 
                            <a href="/inventario/public/docum/edit/{{ $documento->Id }}">
                                <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <form action="/inventario/public/docum/{{ $documento->Id }}" method="POST">
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
        <a href="/inventario/public/softwares" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>
</x-layout>