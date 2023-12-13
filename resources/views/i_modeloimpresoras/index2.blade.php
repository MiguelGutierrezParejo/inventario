<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Modelos de impresoras</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/modeloimpresorasall" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/modeloimpresoras" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar solo altas
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/modeloimpresoras/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo modelo de impresora
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/relacionconsumibles/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nueva relacion consumible
                </a>
                <p class="text-left">**Aparecen {{ count($modeloimpresoras) }} instancias de {{ $total }} totales**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    @php
                     $link = e("Id=" . request('Id') . "&Marca=" . request('Marca') . "&Modelo=" . request('Modelo'));

                     $enlace = e("/inventario/public/modeloimpresorasall");
                    @endphp
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Id&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Id Modelo
                                @if (request('orden') == 'Id') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Marca&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Marca
                                @if (request('orden') == 'Marca') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Modelo&dir={{request('dir') == 'desc' ? 'asc' : 'desc' }}&{!! $link !!}">Modelo
                                @if (request('orden') == 'Modelo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Fecha Alta
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Fecha Baja
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                        <tr class="whitespace-nowrap border border-slate-400 text-center  bg-gray-50 ">
                            <form id="form" action="{{ $enlace }}" method="GET">
                                <td class="border">
                                    <input type="text" class=" px-6 py-2" name="Id" id="Id" value="{{ request()->query('Id') }}">
                                </td>
                                <td class="border">
                                    <input type="text" class=" px-6 py-2" name="Marca" id="Marca" value="{{ request()->query('Marca') }}">
                                </td>
                                <td class="border border-slate-300">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ request()->query('Modelo') }}">
                                </td>
                                <td class="border border-slate-300 "></td>
                                <td class="border border-slate-300"></td>
                                <td class="border border-slate-300"></td>
                                <td class="border border-slate-300 hidden">
                                    <div class="hidden"><button type="submit"></button></div>
                                </td>
                            </form>
                        </tr>


                    @foreach ($modeloimpresoras as $modeloimpresora)

                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">

                                    <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->Id }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->Marca }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->Modelo }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->FechaAlta }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->FechaBaja }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/modeloimpresoras/{{ $modeloimpresora->Id }}">{{ $modeloimpresora->Observaciones }}</a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-layout>
