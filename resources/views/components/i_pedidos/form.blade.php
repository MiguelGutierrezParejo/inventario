@csrf
<div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Consumibles a pedir</h1>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Id</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Cantidad</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Stock</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Modelo</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Referencia</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Precio unidad</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($consumiblesapedir as $consumible)
            
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/consumibles/{{$consumible->Id}}">C-{{ $consumible->Id }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/consumibles/{{$consumible->Id}}">{{ $consumible->Cantidad }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/consumibles/{{$consumible->Id}}">{{ $consumible->Stock }}</a>
                                </div>
                            </td>
                            
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/consumibles/{{$consumible->Id}}">{{ $consumible->Modelo }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/consumibles/{{$consumible->Id}}">{{ $consumible->Referencia }}</a>
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <a href="/inventario/public/consumibles/{{$consumible->Id}}">{{ $consumible->Precio }}€</a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <table width="100%" class="border-collapse text-left"  >
                <tbody class="bg-white">           
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 ">
                                    <strong>Descuento:</strong> {{$descuento}}% 
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <strong> Suma:</strong> {{$sumatoriomenosdescuento}}€ 
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <strong> Iva: </strong> {{$iva}}€ 
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                <strong> Total: </strong> {{$sumatoriocompleto}}€ 
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
</div>
@csrf
@if ($proveedor->Contrato == 'Consumibles')
    <div class="mb-6 mt-6" style="display:none;">
        <label for="IdProveedor"
            class="text-sm font-medium text-gray-900 block mb-2 @error('IdProveedor') text-red-500 @enderror">
            <strong>Proveedor</strong>  
        </label>
        <select type="text" class="border border-slate-300 px-6 py-2" name="IdProveedor" id="IdProveedor" value="{{ $proveedor->Id}}">                                 
                        <option value="{{ $proveedor->Id}}">{{$proveedor->Nombre}}</option>
        </select>
        @error('IdProveedor')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-6 mt-6">
        <strong>Proveedor:</strong> {{$proveedor->Nombre}}
    </div>
@else
    <div class="mb-6 mt-6" style="display:none;">
        <strong>No hay ningún proveedor contratado para los consumibles</strong>
    </div>
@endif

<div class="mt-4">
    <button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
    <a href="/inventario/public/consumibles" style="border-color:#0053D0; background-color: #0053D0"
        class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
</div>

