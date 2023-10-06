<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Lineas</h1>
        {{--dd($variable)--}}
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/lineas"
                    class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/lineas/create"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1 text-center">Nueva Linea
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div> 
            <table width="100%" class="border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-50">
                    @php
                        $link = e("Nombre=" . request('Nombre') . "&Numero=" . request('Numero') . "&Extension=" . request('Extension'));
                    @endphp
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/live?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Titular
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/live?orden=Numero&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Numero
                                @if (request('orden') == 'Numero') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/live?orden=Extension&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Extension
                                @if (request('orden') == 'Extension') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                    <tr class="border border-slate-400 text-center ">
                        <form id="form" action="{{ route('live') }}" method="GET">
                            <input type="hidden" name="orden" value="{{ old('orden') }}">
                            <input type="hidden" name="dir" value="{{ old('dir') }}">
                            <td class="border border-slate-300 ">
                                <input wire:model="search" type="text" class="border border-slate-300 px-6 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
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
                        <tr class="whitespace-nowrap " onclick="document.location='/inventario/public/lineas/{{ $objet->Id }}'" >
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
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Observaciones }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- $objeto->links()--}}
</x-layout>