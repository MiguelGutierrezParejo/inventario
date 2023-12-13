<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Modelos</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/modelos" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Mostrar solo Altas
                </a>
                &nbsp; | &nbsp;
                <a href="/inventario/public/modelos/create"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo modelo
                </a>
            </div>
            <table width="100%" class="table-fixed border-collapse border border-slate-400 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-3/12 border border-slate-300 px-6 py-2 font-semibold">
                            Nombre
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            Fecha de Alta
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            Fecha de Baja
                        </th>
                        <th class="w-5/12 border border-slate-300 px-6 py-2 font-semibold">
                            Observaciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($modelos as $modelo)
                     <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/modelos/{{$modelo->Id}}">{{ $modelo->Modelo }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $modelo->FechaAlta }}
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $modelo->FechaBaja }}
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $modelo->Observaciones }}
                            </div>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
