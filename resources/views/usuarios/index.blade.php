<x-layout>
    <div class="flex flex-col mt-4 text-center">
        <h1 class="mb-4 text-2xl font-semibold">Empleados</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/usuarios" style="background-color: #0053D0"
                    class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/usuarios/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo Empleado
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div>           
            <table width="100%" class="border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-50">
                    @php
                        $link = e("Nombre=" . request('Nombre') . "&Departamento=" . request('Departamento') . "&FechaAlta=" . request('FechaAlta') . "&FechaBaja=" . request('FechaBaja'));
                    @endphp
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/usuarios?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Nombre
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/usuarios?orden=Departamento&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Departamento
                                @if (request('orden') == 'Departamento') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/usuarios?orden=FechaAlta&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fecha Alta
                                @if (request('orden') == 'FechaAlta') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="/inventario/public/usuarios?orden=FechaBaja&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fecha Baja
                                @if (request('orden') == 'FechaBaja') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                    <tr></tr>
                </thead>
                <tbody class="bg-white">
                    {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                    <tr class="whitespace-nowrap border border-slate-400 text-center ">
                        <form id="form" action="{{ route('usuarios') }}" method="GET">
                            <input type="hidden" name="orden" value="{{ old('orden') }}">
                            <input type="hidden" name="dir" value="{{ old('dir') }}">
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
                            </td>
                            <td class="border border-slate-300">
                                <input type="text" class="border border-slate-300 px-6 py-2" name="Departamento" id="Departamento" value="{{ request()->query('Departamento') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <input type="date" class="border border-slate-300 px-6 py-2" name="FechaAlta" id="FechaAlta" value="{{ request()->query('FechaAlta') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <input type="date" class="border border-slate-300 px-6 py-2" name="FechaBaja" id="FechaBaja" value="{{ request()->query('FechaBaja') }}">
                                <div class="hidden"><button type="submit" type="hidden"></button></div>
                            </td>
                        </form>
                    </tr>
                    {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}
                    @foreach ($objeto as $objet)

                        <tr class="whitespace-nowrap" onclick="document.location='/inventario/public/usuarios/{{ $objet->Id }}'">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Nombre }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Departamento }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->FechaAlta->format('d-m-Y') }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->FechaBaja }}
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
    {{ $objeto->links()}}
</x-layout>