<x-layout>
    <form action="{{  url('/recepcion/recepciontodos') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col text-center mt-4">
            <h1 class="mb-4 text-2xl font-semibold">Recepcionar todo</h1>
                <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-slate-300 px-6 py-2 font-semibold">
                                <a href="">Consumible</a>
                            </th>
                            <th class="border border-slate-300 px-6 py-2 font-semibold">
                                <a href="">Cantidad</a>
                            </th>
                            <th class="border border-slate-300 px-6 py-2 font-semibold">
                                <a href="">Cantidad recibida</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach ($pedido->detalles as $detalle)
                
                            @if ($detalle->Cantidad != 0)
                            <tr class="whitespace-nowrap border border-slate-400">
                                <td class="border border-slate-300 px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    <a>{{ $detalle->consumible->Modelo }}</a>
                                    </div>
                                </td>
                                <td class="border border-slate-300 px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    <a>{{ $detalle->Cantidad }}</a>
                                    </div>
                                </td>
                                <td class="border border-slate-300 px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                    <a>{{ $detalle->Cantidad }}</a>
                                    </div>
                                </td>
                            </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>

    </div>
    @csrf
    <div class="mb-6">
        <label for="IdPedido"
            class="text-sm font-medium text-gray-900 block mb-2 @error('IdPedido') text-red-500 @enderror">
            Id Pedido
        </label>
        <input type="text" name="IdPedido" id="IdPedido"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('IdPedido') border-red-500 @enderror"
            value="{{$pedido->Id}}" readonly>
        @error('IdPedido')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="Albaran"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Albaran') text-red-500 @enderror">
            Albarán
        </label>
        <input type="file" name="Albaran" id="Albaran"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('Albaran') border-red-500 @enderror"
            value="{{ old('Albaran', $recepcion->Albaran) }}">
        @error('Albaran')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="Observaciones"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Observaciones') text-red-500 @enderror">
            Observaciones
        </label>
        <input type="text" name="Observaciones" id="Observaciones"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('Observaciones') border-red-500 @enderror"
            value="{{ old('Observaciones', $recepcion->Observaciones) }}">
        @error('Observaciones')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/pedidos/{{$pedido->Id}}"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </div>
    </form>
</x-layout>