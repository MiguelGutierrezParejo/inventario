<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <h1 class="text-2xl">Datos del equipo:</h1>

        <h3 class="border-t mb-2 pt-3 font-semibold">Tipo:
            <span class="font-thin">{{ $equipo->tipo->Denominacion }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fabricante:
            <span class="font-thin">{{ $equipo->Fabricante }}</span>
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
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $equipo->Observaciones }}</span>
        </h3>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl">Asignaciones:</h1>
            <a href="/inventario/public/relequip/create/{{ $equipo->Id }}"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Asignar
            </a>
        </div>
            <table class="table-fixed border border-gray-500 border-collapse w-4/5 mx-24 mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-3/12 bg-gray-300 text-left px-2">Empleado</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Fecha Alta</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Fecha Baja</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Observaciones</th>
                        <td class="text-left px-2"><svg class="h-8 w-8 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />  <circle cx="8.5" cy="7" r="4" />  <line x1="20" y1="8" x2="20" y2="14" />  <line x1="23" y1="11" x2="17" y2="11" /></svg></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relacion as $rel )
                    <tr>
                        <td class="text-left px-2">{{ $rel->usuario->Nombre}}</td>
                        <td class="px-2">{{ $rel->FechaAlta->format('d-m-Y')}}</td>

                        <td class="px-2">@if ($rel->FechaBaja)
                                                {{$rel->FechaBaja->format('d-m-Y')}}
                                         @endif
                        </td>
                        <td class="px-2">{{ $rel->Observaciones}}</td>
                        <td class="px-2"> <a href="/inventario/public/relequip/edit/{{ $rel->Id }}"><svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <h1 class="text-2xl">Mantenimiento:</h1>
        <table class="table-fixed border border-gray-500 border-collapse w-4/5 mx-24 mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-3/12 bg-gray-300 text-left px-2">Elemento</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Características</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Fabricante</th>
                        <th class="w-3/12 bg-gray-300 text-left px-2">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mantenimiento as $mant )
                    <tr>
                        <td class="text-left px-2">{{ $mant->Nombre}}</td>
                        <td class="px-2">{{ $mant->Caracteristicas}}</td>
                        <td class="px-2">{{ $mant->Fabricante}}</td>
                        <td class="px-2">{{ $mant->Observaciones}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="flex justify-end space-x-2 pt-3">
        <a href="{{ route('equipos') }}"
            class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
    </div>
</x-layout>