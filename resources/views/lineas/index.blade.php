<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Lineas</h1>
        <div>
            <div class="p-2 text-right">
                @if ($tipo == 'Completo')
                    <a href="/inventario/public/lineasindex/Simple" style="background-color: #0053D0"
                        class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar Simple
                    </a> &nbsp; | &nbsp;
                @else
                    <a href="/inventario/public/lineasindex/Completo" style="background-color: #0053D0"
                        class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar todo
                    </a> &nbsp; | &nbsp;
                @endif
                <a href="/inventario/public/lineasindex/{{$tipo}}" style="background-color: #0053D0"
                    class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/lineas/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nueva Linea
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/lineas/recabar" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Generar Inventario
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div> 
            <table width="100%" class="border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-50">
                    @php
                        $link = e("Nombre=" . request('Nombre') . "&NInventario=" . request('NInventario') . "&Numero=" . request('Numero') . "&Extension=" . request('Extension'));

                        $enlace = e("/inventario/public/lineasindex/$tipo");
                    @endphp
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NInventario&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Referencia
                                @if (request('orden') == 'NInventario') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Titular
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Numero&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Numero
                                @if (request('orden') == 'Numero') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Extension&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Extension
                                @if (request('orden') == 'Extension') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold w-fit">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                    <tr class="border border-slate-400 text-center ">
                        <form id="form" action="{{ $enlace }}" method="GET">
                            <input type="hidden" name="orden" value="{{ old('orden') }}">
                            <input type="hidden" name="dir" value="{{ old('dir') }}">
                            <td class="border">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="NInventario" id="NInventario" value="{{ request()->query('NInventario') }}">
                            </td>
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
                            </td>
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Numero" id="Numero" value="{{ request()->query('Numero') }}">
                            </td>
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Extension" id="Extension" value="{{ request()->query('Extension') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="hidden"><button type="submit" type="hidden"></button></div>
                            </td>
                        </form>
                    </tr>
                    {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}
                    @foreach ($objeto as $objet)
                        <tr class="whitespace-normal" onclick="document.location='/inventario/public/lineas/{{ $objet->Id }}'">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/lineas/{{$objet->Id}}"><strong> {{ $objet->NInventario }} </strong></a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Nombre }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Numero }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Extension }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-ellipsis text-sm text-gray-900">
                                    {{ $objet->Observaciones }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>