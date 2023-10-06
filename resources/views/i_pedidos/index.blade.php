<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Pedidos</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/pedidos" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a>
                <p class="text-left">**Aparecen {{ count($pedidos) }} instancias**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class=" border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Proveedor</a>
                            <a href="/inventario/public/pedidos/{{'IdProveedor'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/pedidos/{{'IdProveedor'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Fecha</a>
                            <a href="/inventario/public/pedidos/{{'Fecha'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/pedidos/{{'Fecha'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Importe</a>
                            <a href="/inventario/public/pedidos/{{'Importe'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/pedidos/{{'Importe'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Estado</a>
                            <a href="/inventario/public/pedidos/{{'Finalizado'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/pedidos/{{'Finalizado'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Documento</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            Detalles
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($pedidos as $pedido)
         
                     <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                              <a href="/inventario/public/pedidos/{{$pedido->Id}}">{{ $pedido->proveedor->Nombre }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                              <a>{{ date('d-m-Y', strtotime($pedido->Fecha)) }}</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">
                           <a>{{ $pedido->Importe }}€</a>
                           </div>
                        </td>
                        <td class="border border-slate-300 px-6 py-4">
                           <div class="text-sm text-gray-900">

                              @if ($pedido->Finalizado == 0) 
                                 <a>Pendiente</a>
                              @else 
                                 <a>Finalizado</a>
                              @endif
                           </div>
                        </td>
                        <td class="text-center border border-slate-300 px-2 py-4">
                           <a href="{{$pedido->Documento}}"
                              class="text-white bg-green-700 font-semibold rounded-lg text-sm px-5 py-1 mr-2 text-center">Valorado
                           </a>
                           <a href="{{$pedido->DocumentoSinValorar}}"
                              class="text-white bg-red-700 font-semibold rounded-lg text-sm px-5 py-1 text-center">Sin valorar
                           </a>
                        </td>
                        <td class="border border-slate-300 px-2 py-4">
                            <a href="/inventario/public/pedidos/{{$pedido->Id}}">
                                <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            </div>
                        </td>
                     </tr> 

                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</x-layout>