<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Contratos</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/contratos/create"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo contrato
                </a>
            </div>
            <table width="100%" class="table-fixed border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Nombre</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Adjudicativos</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Fecha</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Observaciones</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Estado</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($contratos as $contrato)

                     <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/contratos/{{$contrato->Id}}">{{ $contrato->Nombre }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $contrato->Adjudicativos }}
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{date('d-m-Y', strtotime($contrato->Fecha))}}
                            </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                            <div class="text-sm text-gray-900">
                                 {{ $contrato->Observaciones }}
                            </div>
                         </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                {{ $contrato->Estado }}
                           </div>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
