<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Proveedores</h1>
        <div>
            <div class="p-2 text-right">
                <p class="text-left">**Aparecen {{ count($proveedores) }} instancias**</p>
                <a href="/inventario/public/proveedores/create" style="background-color: #7b241c"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo proveedor
                </a>
            </div>
            <table width="100%" class="table-fixed border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Nombre</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Teléfono</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Correo</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Cif</a>
                        </th>
                        <th class="w-2/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Observaciones</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($proveedores as $proveedor)
         
                     <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/proveedores/{{$proveedor->Id}}">{{ $proveedor->Nombre }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/proveedores/{{$proveedor->Id}}">{{ $proveedor->Telefono }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/proveedores/{{$proveedor->Id}}">{{ $proveedor->Correo }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/proveedores/{{$proveedor->Id}}">{{ $proveedor->Cif }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                                <a href="/inventario/public/proveedores/{{$proveedor->Id}}">{{ $proveedor->Observaciones }}</a>
                           </div>
                        </td>
                     </tr> 

                    @endforeach
                </tbody>
                
            </table>
            
        </div>
    </div>
</x-layout>