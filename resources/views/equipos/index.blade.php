<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Equipos</h1>
        <div>
            <div class="p-2 text-right">
                <a id="bajas"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">{{$pulsado}}
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/create"
                    style="background-color: #7b241c" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo Equipo
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/recabar"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Generar Inventario
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/etiquetar/Simple"
                    style="background-color:  #0b5345 " class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Etiquetar
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>

            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    @php
                        $link = e("Nombre=" . request('Nombre') . "&NInventario=" . request('NInventario') . "&IdTipo=" . request('IdTipo')
                        . "&NombreOrdenador=" . request('NombreOrdenador') . "&Modelo=" . request('IdModelo') . "&FechaAlta=" . request('FechaAlta')
                        . "&FechaBaja=" . request('FechaBaja') . "&PrecioAdquisicion=" . request('PrecioAdquisicion'));

                        if ($pulsado == "Mostrar Todo"){
                            $enlace = e("/inventario/public/");}
                        else
                            $enlace = e("/inventario/public/equipos");
                    @endphp

                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NInventario&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Referencia
                                @if (request('orden') == 'NInventario') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NombreOrdenador&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Nombre del equipo
                                @if (request('orden') == 'NombreOrdenador') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Empleado
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>

                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=IdTipo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Tipo
                                @if (request('orden') == 'IdTipo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=IdModelo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Modelo
                                @if (request('orden') == 'IdModelo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
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
                    <tr class="border border-slate-400 text-center  bg-gray-50 ">
                        <form id="form" action="{{ $enlace }}" method="GET">
                            <input type="hidden" name="orden" value="{{ old('orden') }}">
                            <input type="hidden" name="dir" value="{{ old('dir') }}">
                            <td class="border">
                                <input type="text" style="width:150px;" class="border border-slate-300 px-6 py-2" name="NInventario" id="NInventario"
                                value="{{ request()->query('NInventario') }}">
                            </td>
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="NombreOrdenador" id="NombreOrdenador"
                                value="{{ request()->query('NombreOrdenador') }}">
                            </td>
                            <td class="border border border-slate-300">
                                <input type="text" class="border border-slate-300  px-6 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
                            </td>
                            <td>
                                <select type="text" class="border border-slate-300 px-6 py-2" name="IdTipo" id="IdTipo" value="{{ request()->query('IdTipo') }}">
                                    <option value="{{ request()->query('IdTipo') }}" selected>{{ request()->query('IdTipo') }}</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->Id }}">{{ $tipo->Denominacion }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border border-slate-300">
                                <select type="text" class="border border-slate-300 px-6 py-2" name="IdModelo" id="IdModelo" value="{{ request()->query('IdModelo') }}">
                                    <option value="{{ request()->query('IdModelo') }}" selected>{{ request()->query('IdModelo') }}</option>
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo->Id }}">{{ $modelo->Modelo }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border border-slate-300 px-6 py-4 ocultar">
                                <input type="date" class="border border-slate-300 px-6 py-2" name="FechaBaja" id="FechaBaja" value="{{ request()->query('FechaBaja') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4 ocultar">
                                <div class="hidden"><button type="submit"></button></div>
                            </td>
                        </form>
                    </tr>
                    {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}

                    <?php $contador = 0; ?>

                    @foreach ($objeto as $object)
                    <?php $contador += 1; ?>

                    <tr class=" border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->NInventario }}</a>
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->NombreOrdenador }}</a>
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                            {{ $object->Nombre }}
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->Denominacion }}</a>
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->Modelo }}</a>
                            </div>
                        </td>
                            <td class="border border-slate-300 px-6 py-4 ocultar">
                                <div class="text-sm text-gray-900">
                                    @if ($object->FechaBaja)
                                        {{date('d-m-Y', strtotime($object->FechaBaja))}}
                                    @endif
                                </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->Observaciones }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
