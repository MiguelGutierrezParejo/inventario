<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Software</h1>
        <div>
            <div class="p-2 text-right">
                <p class="text-left">**Aparecen {{ count($softwares) }} instancias**</p>
                <a href="/inventario/public/softwares" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar solo Altas
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/softwares/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo software
                </a>
            </div>
            <table width="100%" class="table-fixed border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-3/12 border border-slate-300 px-6 py-2 font-semibold">
                            Nombre
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            Proveedor
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            Cantidad
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            Asignados
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            Tipo
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            Fecha de Baja
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($softwares as $software)
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">{{ $software->Nombre }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a>{{ $software->proveedor->Nombre }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">{{ $software->Cantidad }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">
                                        @php
                                            $relacionesusuarios = $software->relaciones->filter(function ($relacion) {
                                                return $relacion->FechaBaja === null;
                                            });
                                            $relacionesequipos = $software->relacionesequipos->filter(function ($relacion) {
                                                return $relacion->FechaBaja === null;
                                            });
                                        @endphp
                                        {{ $relacionesusuarios->count() + $relacionesequipos->count() }}
                                    </a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">{{ $software->Tipo }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">{{ optional($software->FechaBaja)->format('d-m-Y') }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/softwares/{{ $software->Id }}">{{ $software->Observaciones }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
