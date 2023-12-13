<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Impresoras</h1>
        <div>
            <div class="p-2 text-right">
                @if ($tipo == 'Completo')
                    <a href="/inventario/public/impresorasindex/Simple" style="background-color: #0053D0"
                        class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar Simple
                    </a> &nbsp; | &nbsp;
                @else
                    <a href="/inventario/public/impresorasindex/Completo" style="background-color: #0053D0"
                        class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar todo
                    </a> &nbsp; | &nbsp;
                @endif
                <a href="/inventario/public/impresorasindex/{{$tipo}}" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/impresoras/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nueva impresora
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/impresoras/recabar" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Generar Inventario
                </a>
                <p class="text-left">**Aparecen {{ count($impresoras) }} instancias de {{ $total }}**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-100">
                    @php
                        $link = e("Id=" . request('Id') . "&NInventario=" . request('NInventario') . "&Modelo=" . request('Modelo')
                        . "&Nombre=" . request('Nombre') . "&NumSerie" . request('NumSerie') . "&PrecioAdquisicion=" . request('PrecioAdquisicion'));

                        $enlace = e("/inventario/public/impresorasindex/$tipo");
                    @endphp
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NInventario&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Referencia
                                @if (request('orden') == 'NInventario') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Id&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Id
                                @if (request('orden') == 'Id') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                        <a href="{!! $enlace !!}?orden=Nombre&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Usuario
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Modelo&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Modelo
                                @if (request('orden') == 'Modelo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NumSerie&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Número de Serie
                                @if (request('orden') == 'NumSerie') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="border border-slate-400 text-center bg-gray-50">
                        <form id="form" action="{{ $enlace }}" method="GET">
                            <td class="border">
                                <input type="text" style="width:150px;" class="border border-slate-300 px-6 py-2" name="NInventario" id="NInventario"
                                value="{{ request()->query('NInventario') }}">
                            </td>
                            <td class="border">
                                <input type="text" style="width:100px;" class="border border-slate-300 px-6 py-2" name="Id" id="Id" value="{{ request()->query('Id') }}">
                            </td>
                            <td class="border">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
                            </td>
                            <td class="border border-slate-300">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ request()->query('Modelo') }}">
                            </td>
                            <td class="border border-slate-300">
                                <input type="text" style="width:150px;" class="border border-slate-300 px-6 py-2" name="NumSerie" id="NumSerie"
                                value="{{ request()->query('NumSerie') }}">
                            </td>
                            <td class="border border-slate-300 hidden ">
                                <div class="hidden"><button type="submit"></button></div>
                            <td class="border border-slate-300 ">
                        </form>
                    </tr>
                    @foreach ($impresoras as $impresora)
                        <tr class=" border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/impresoras/{{$impresora->Id}}"><strong> {{ $impresora->NInventario }} </strong></a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/impresoras/{{$impresora->Id}}"><strong> {{ $impresora->Id }} </strong></a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/usuarios/{{ $impresora->IdUsuario }}"><strong> {{ $impresora->Nombre }} </strong></a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/modeloimpresoras/{{$impresora->IdModImpresora}}">{{ $impresora->Modelo }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $impresora->NumSerie }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $impresora->Observaciones }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
