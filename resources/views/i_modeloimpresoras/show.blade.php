<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del modelo</strong>
            <a href="/inventario/public/modeloimpresoras/edit/{{ $modelo->Id }}" style="background-color: #0053D0"
                class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1">Editar</a>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Id:
            <span class="font-thin">{{ $modelo->Id }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Marca:
            <span class="font-thin">{{ $modelo->Marca }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Modelo:
            <span class="font-thin">{{ $modelo->Modelo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $modelo->Observaciones }}</span>
        </h3>
    </div>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg mt-4">
        <div class="flex justify-between">
            <strong class="text-2xl">Impresoras</strong>
        </div>

        <table class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-3/12 bg-gray-300 text-left px-2">Usuario</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Número de serie</th>
                        <th class="w-1/12 bg-gray-300 text-left px-2">Baja</th>
                        <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($modelo->impresoras as $impresora)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a>{{ $impresora->usuario->Nombre }}</a></td>
                        <td class="px-2 border border-black"><a href="">{{$impresora->NumSerie}}</a></td>
                        <td class="text-left px-2 border border-black">
                            @if ($impresora->Baja == 0)
                                <a href="/inventario/public/impresoras/{{$impresora->Id}}">No</a>
                            @else 
                                <a href="/inventario/public/impresoras/{{$impresora->Id}}">Si</a>
                            @endif
                        </td>
                        <td class="px-2 border border-black"><a href="">{{$impresora->Observaciones}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/modeloimpresoras" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>

</x-layout>