<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Equipos</h1>
        <div>

            <div class="p-2 text-right">
                <a id="bajas" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-1 text-center">{{ $pulsado }}</a> 
                <a href="/inventario/public/"
                    class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-gray-300 font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/create"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo Equipo
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                        @php
                            $link = e("Titular=" . request('Titular') . "&IdTipo=" . request('IdTipo') . "&Fabricante=" . request('Fabricante') 
                            . "&Modelo=" . request('Modelo') . "&FechaAlta=" . request('FechaAlta') . "&FechaBaja=" . request('FechaBaja'));

                            if ($pulsado == "Mostrar Todo"){
                                $enlace = e("/inventario/public/");} 
                            else
                                $enlace = e("/inventario/public/equipos");
                        @endphp
                
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Titular&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Empleado
                                @if (request('orden') == 'Titular') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=IdTipo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Tipo
                                @if (request('orden') == 'IdTipo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Modelo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Modelo
                                @if (request('orden') == 'Modelo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Fabricante&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fabricante
                                @if (request('orden') == 'Fabricante') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold ocultar">
                            <a href="{!! $enlace !!}?orden=FechaBaja&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fecha Baja
                                @if (request('orden') == 'FechaBaja') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                            {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                        <tr class="whitespace-nowrap border border-slate-400 text-center  bg-gray-50 ">
                            <form id="form" action="{{ $enlace }}" method="GET">
                                <input type="hidden" name="orden" value="{{ old('orden') }}">
                                <input type="hidden" name="dir" value="{{ old('dir') }}">
                                <td class="border">
                                    <input type="text" class=" px-6 py-2" name="Titular" id="Titular" value="{{ request()->query('Titular') }}">
                                </td>
                                <td>
                                    <select type="text" class="px-6 py-2" name="IdTipo" id="IdTipo" value="{{ request()->query('IdTipo') }}">
                                        <option selected></option>
                                        @foreach ($tipos as $tipo) 
                                            <option value="{{ $tipo->Id }}">{{ $tipo->Denominacion }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="border border-slate-300">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ request()->query('Modelo') }}">
                                </td>
                                <td class="border border-slate-300 ">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="Fabricante" id="Fabricante" value="{{ request()->query('Fabricante') }}">
                                </td>                                
                                    @if ($pulsado != "Mostrar Todo")
                                        <td class="border border-slate-300 px-6 py-4 ocultar">
                                            <input type="date" class="border border-slate-300 px-6 py-2" name="FechaBaja" id="FechaBaja" value="{{ request()->query('FechaBaja') }}">
                                        </td>
                                    @endif
                                
                                
                                <td class="border border-slate-300 px-6 py-4 ocultar">
                                    <div class="hidden"><button type="submit"></button></div>
                                </td>
                            </form>
                        </tr>
                            {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}
                    

                    @foreach ($objeto as $object)
            
                        <tr class="whitespace-nowrap border border-slate-400" onclick="document.location='/inventario/public/equipos/{{ $object->Id }}'">
                        <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @if ( ! $object->relaciones->where('FechaBaja', null)->isEmpty()) 
                                        {{ $object->relaciones->where('FechaBaja', null)->last()->usuario->Nombre }}
                                    
                                    @endif
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $object->tipo->Denominacion }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $object->Modelo }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $object->Fabricante }}
                                </div>
                            </td>
                            @if ($pulsado != "Mostrar Todo")
                                <td class="border border-slate-300 px-6 py-4 ocultar">
                                    <div class="text-sm text-gray-900">
                                        @if ($object->FechaBaja)
                                            {{$object->FechaBaja->format('d-m-Y')}}
                                        @endif
                                    </div>
                                </td>
                            @endif
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $object->Observaciones }} 
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>