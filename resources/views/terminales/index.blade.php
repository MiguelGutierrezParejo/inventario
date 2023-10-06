<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Terminales</h1>

        <div>
            <div class="p-2 text-right"> 

                <?php if ($pulsado != "Mostrar Todo") { ?>
                    <a href="/inventario/public/terminales" style="background-color: #0053D0" 
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">{{ $pulsado }}</a> &nbsp; | &nbsp;
                <?php } else { ?>
                    <a href="/inventario/public/terminales/todos" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">{{ $pulsado }}</a> &nbsp; | &nbsp;
                <?php } ?>

                <a href="/inventario/public/terminales" style="background-color: #0053D0"
                    class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/terminales/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo Terminal
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/terminales/recabar" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Generar Inventario
                </a>
                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-50">
                    @php
                        $link = e("Nombre=" . request('Nombre') . "&NInventario=" . request('NInventario') . "&Marca=" . request('Marca') . "&Modelo=" . request('Modelo') 
                        . "&FechaAlta=" . request('FechaAlta') . "&FechaBaja=" . request('FechaBaja') . "&PrecioAdquisicion=" . request('PrecioAdquisicion'));


                        if ($pulsado == "Mostrar Todo"){
                            $enlace = e("/inventario/public/terminales");} 
                        else
                            $enlace = e("/inventario/public/terminales/todos");
                    @endphp
                    <tr>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 text-xs text-gray-500">
                            <a href="{!! $enlace !!}?orden=NInventario&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Referencia
                                @if (request('orden') == 'NInventario') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 text-xs text-gray-500">
                            <a href="/inventario/public/terminales?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Titular
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-4 py-2 text-xs text-gray-500">
                            <a href="/inventario/public/terminales?orden=Marca&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Marca
                                @if (request('orden') == 'Marca') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-4 py-2 text-xs text-gray-500">
                            <a href="/inventario/public/terminales?orden=Modelo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Modelo
                                @if (request('orden') == 'Modelo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 text-xs text-gray-500">
                                <a href="{!! $enlace !!}?orden=FechaAlta&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fecha Alta
                                    @if (request('orden') == 'FechaAlta') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                                </a>
                        </th>
                        
                        <?php if ($pulsado != "Mostrar Todo") { ?>
                            <th class="border border-slate-300 px-6 py-2 text-xs text-gray-500">
                                <a href="{!! $enlace !!}?orden=FechaBaja&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Fecha Baja
                                    @if (request('orden') == 'FechaBaja') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                                </a>
                            </th>
                        <?php } ?>

                        <th class="border border-slate-300 px-4 py-2 text-xs text-gray-500">
                            Observaciones
                        </th>
                    </tr>
                    <tr></tr>
                </thead>
                <tbody class="bg-white">
                {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                    <tr class="border border-slate-400 text-center ">
                        <form id="form" action="{{ route('terminales') }}" method="GET">
                            <input type="hidden" name="orden" value="{{ old('orden') }}">
                            <input type="hidden" name="dir" value="{{ old('dir') }}">
                            <td class="border">
                                    <input type="text" style="width:100px;" class="border border-slate-300 px-6 py-2" name="NInventario" id="NInventario" 
                                    value="{{ request()->query('NInventario') }}">
                            </td>
                            <td class="border border-slate-300 ">
                                <input type="text" class="border border-slate-300 px-2 py-2" name="Nombre" id="Nombre" value="{{ request()->query('Nombre') }}">
                            </td>
                            <td class="border border-slate-300">
                                <input type="text" class="border border-slate-300 py-2" name="Marca" id="Marca" value="{{ request()->query('Marca') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <input type="text" style="width:150px;" class="border border-slate-300 py-2" name="Modelo" id="Modelo" value="{{ request()->query('Modelo') }}">
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                    <input type="date"  class="border border-slate-300 px-6 py-2" name="FechaAlta" id="FechaAlta" value="{{ request()->query('FechaAlta') }}">
                            </td>   
                            <?php if ($pulsado != "Mostrar Todo") { ?>
                                <td class="border border-slate-300 px-6 py-4">
                                    <input type="date" class="border border-slate-300 px-6 py-2" name="FechaBaja" id="FechaBaja" value="{{ request()->query('FechaBaja') }}">
                                </td>
                            <?php } ?>
                            
                            <td class="border border-slate-300 py-4">
                                <div class="hidden"><button type="submit" type="hidden"></button></div>
                            </td>
                        </form>
                    </tr>
                    {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}
                    @foreach ($objeto as $objet)
                        <tr class="whitespace-nowrap" onclick="document.location='/inventario/public/terminales/{{ $objet->Id }}'">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->NInventario }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Nombre }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Marca }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $objet->Modelo }}
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                                {{date('d-m-Y', strtotime($objet->FechaAlta))}}
                                    </div>
                                </td>
                            <?php if ($pulsado != "Mostrar Todo") { ?>
                                <td class="border border-slate-300 px-6 py-4 ocultar">
                                    <div class="text-sm text-gray-900">
                                            @if ($objet->FechaBaja)
                                                {{date('d-m-Y', strtotime($objet->FechaBaja))}}
                                            @endif
                                    </div>
                                </td>
                            <?php } ?>
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
</x-layout>