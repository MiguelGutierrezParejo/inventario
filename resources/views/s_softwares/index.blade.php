<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Software</h1>
        <div>
            <div class="p-2 text-right">
                <p class="text-left">**Aparecen {{ count($softwares) }} instancias**</p>
                <a href="/inventario/public/softwares/create"
                    style="background-color: #7b241c" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo software
                </a>
            </div>
            <table width="100%" class="table-fixed border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-4/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Nombre</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Proveedor</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Cantidad</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Asignados</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Tipo</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Observaciones</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($softwares as $software)

                     <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/softwares/{{$software->Id}}">{{ $software->Nombre }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a>{{ $software->proveedor->Nombre }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/softwares/{{$software->Id}}">{{ $software->Cantidad }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/softwares/{{$software->Id}}">{{ $software->relaciones->count() + $software->relacionesequipos->count() }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/softwares/{{$software->Id}}">{{ $software->Tipo }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/softwares/{{$software->Id}}">{{ $software->Observaciones }}</a>
                           </div>
                        </td>
                     </tr> 

                    @endforeach
                </tbody>
                
            </table>
            
        </div>
    </div>
</x-layout>