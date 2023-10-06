<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Mantenimiento de impresoras</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/mantenimientoimpresoras" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a>
                <p class="text-left">**Aparecen {{ count($mantenimientos) }} instancias**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Consumible</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Id</a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Id'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Id'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Id impresora</a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'IdImpresora'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'IdImpresora'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Id consumible</a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'IdConsumible'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'IdConsumible'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Fecha</a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Fecha'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Fecha'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Observaciones'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/mantenimientoimpresoras/{{'Observaciones'}}/{{'desc'}}">&darr;</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($mantenimientos as $mantenimiento)
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/consumibles/{{$mantenimiento->IdConsumible}}">{{ $mantenimiento->consumible->Modelo }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/mantenimientoimpresoras/{{$mantenimiento->Id}}">{{ $mantenimiento->Id }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/impresoras/{{$mantenimiento->IdImpresora}}">{{ $mantenimiento->IdImpresora }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/consumibles/{{$mantenimiento->IdConsumible}}">{{ $mantenimiento->IdConsumible }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <!-- Pasar $mantenimiento->Fecha a tipo date(está string) para poder usar el date y darle formato-->
                                    <a href="/inventario/public/consumibles/{{$mantenimiento->IdConsumible}}">{{ date('d-m-Y', strtotime($mantenimiento->Fecha)) }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $mantenimiento->Observaciones }} 
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</x-layout>