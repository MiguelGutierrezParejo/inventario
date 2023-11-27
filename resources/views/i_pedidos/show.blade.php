<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del pedido</strong>
        </div>
        <h3 class="border-t mb-2 pt-3 font-semibold">Id:
            <span class="font-thin">{{ $pedido->Id }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold ">Proveedor:
            <span class="font-thin"><a>{{ $pedido->proveedor->Nombre }}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha:
            <span class="font-thin"><a>{{ date('d-m-Y', strtotime($pedido->Fecha)) }}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Importe:
            <span class="font-thin">{{ $pedido->Importe }}€</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Finalizado:
            @if ($pedido->Finalizado == 0)
                <span class="font-thin">Pendiente</span>
            @else
                <span class="font-thin">Finalizado</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold text-center">
            <a href="{{ $pedido->Documento }}"
                class="text-white bg-green-700 font-semibold rounded-lg text-sm px-5 py-1 mr-2 text-center">Valorado
            </a>
            <a href="{{ $pedido->DocumentoSinValorar }}"
                class="text-white bg-red-700 font-semibold rounded-lg text-sm px-5 py-1 text-center">Sin valorar
            </a>
        </h3>
    </div>

    @if ($pedido->Finalizado == 0)
        <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg mt-4">
            <div class="flex justify-between">
                <div>
                    <strong class="text-2xl">Detalles del pedido</strong>
                </div>
                <div class="px-5 flex justify-between">
                    <a href="/inventario/public/recepcion/create/{{ $pedido->Id }}"
                        class="text-white bg-blue-600 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-1 mr-2">Recepción
                        parcial
                    </a>
                    <a href="/inventario/public/recepcion/todos/{{ $pedido->Id }}"
                        class="text-white bg-blue-400 hover:bg-blue-400 focus:ring-4 focus:ring-blue-400 font-semibold rounded-lg text-sm px-5 py-1">Recepcionar
                        todo
                    </a>
                </div>
            </div>

            <table class="table-fixed border border-gray-500 border-collapse mt-14">
                <thead>
                    <tr class="border-b-2 border-black">
                        <th class="w-4/12 bg-gray-300 text-left px-2">Consumible</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Cantidad por recibir</th>
                        <th class="w-2/12 bg-gray-300 text-left px-2">Cantidad recibida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 0; ?>
                    @foreach ($pedido->detalles as $detalle)
                        <?php $contador += 1; ?>
                        <tr class="border border-black">
                            <td class="text-left px-2 border border-black"><a>{{ $detalle->consumible->Modelo }}</a>
                            </td>
                            <td class="px-2 border border-black">{{ $detalle->Cantidad }}</td>
                            <!-- Permite cambiar la cantidad recibida de dicho consumible al pulsar la tecla ENTER -->
                            <form action="/inventario/public/detallespedidos/{{ $detalle->Id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="px-2 border border-black">
                                    <input type="text" min="0" max="{{ $detalle->Cantidad }}"
                                        name="CantidadRecibida" value="{{ $detalle->CantidadRecibida }}"
                                        onkeypress="return handleEnter(event, this.form)" />
                                    <script>
                                        var x = document.getElementById("{{ $contador }}").addEventListener("keyup", function(event) {
                                            event.preventDefault();
                                            if (event.keyCode === 13) {
                                                var cantidadrecibida = document.getElementById("{{ $contador }}").value;
                                                var iddetalle = "{{ $detalle->Id }}";

                                                // Utiliza solo el ID al redireccionar
                                                document.location.replace('/inventario/public/detallespedidos/' + iddetalle);
                                            }
                                        });
                                    </script>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <?php $albaranes = 0; ?>
            @foreach ($pedido->recepciones as $recepcion)
                <?php $albaranes += 1; ?>
            @endforeach
            <strong class="text-2xl">Albaranes asignados ({{ $albaranes }})</strong>
        </div>
        <table width="100%" class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-1/12 bg-gray-300 text-left px-2">Fecha</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>
                    <th class="w-1/12 bg-gray-300 text-left px-2">Ver albarán</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->recepciones as $recepcion)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black">
                            {{ date('d-m-Y', strtotime($recepcion->Fecha)) }}</td>
                        <td class="text-left px-2 border border-black">{{ $recepcion->Observaciones }}</td>
                        <td class="px-2">
                            <a href="{{ $recepcion->Albaran }}">
                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/pedidos" style="border-color:#0053D0; background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>

</x-layout>
