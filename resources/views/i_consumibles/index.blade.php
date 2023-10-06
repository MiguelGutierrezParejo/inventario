<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Consumibles</h1>
        <div>
            <div class="p-2 text-right">
                <a href="/inventario/public/consumibles" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/consumibles/create"
                    style="background-color: #7b241c" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Nuevo consumible
                </a> 
                &nbsp; | &nbsp;
                <a href="/inventario/public/consumibles/generar" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Lista de consumibles PDF
                </a> &nbsp; | &nbsp;
                <!--<a href="/inventario/public/pedidos/create" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">-->
                <a href="/inventario/public/pedidos/proveedor" style="background-color: #0053D0"
                    class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Pedir
                </a>
                <p class="text-left">**Aparecen {{ count($consumibles) }} instancias**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-3/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Impresoras</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Cantidad a pedir</a>
                            <a href="/inventario/public/consumibles/{{'Cantidad'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/consumibles/{{'Cantidad'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="w-1/12 border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Pendiente*</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Stock</a>
                            <a href="/inventario/public/consumibles/{{'Stock'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/consumibles/{{'Stock'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Modelo</a>
                            <a href="/inventario/public/consumibles/{{'Modelo'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/consumibles/{{'Modelo'}}/{{'desc'}}">&darr;</a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="">Referencia</a>
                            <a href="/inventario/public/consumibles/{{'Referencia'}}/{{'asc'}}">&uarr; </a>
                            <a href="/inventario/public/consumibles/{{'Referencia'}}/{{'desc'}}">&darr;</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    <?php $contador = 0; ?>
                    <?php $i = 0; ?>
                    <?php $contadorstock = 'stock' . $i; ?>
                    @foreach ($consumibles as $consumible)
                        <?php $contador += 1; ?>
                        <?php $i += 1; ?>
                        <?php $contadorstock = 'stock' . $i ?>
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">

                                <?php



                                    $totalimpresoras = "" ?>
                                <!-- Recorrer todas las relaciones con modelos que tiene un consumible-->

                                @foreach ($consumible->relaciones as $relacion)
                                    <!-- Sumar a $totalimpresoras todas las impresoras que tiene el modelo asociado al consumible -->
                                    <?php foreach($relacion->modelo->impresoras as $impresora) {
                                        $totalimpresoras = $impresora->usuario->Nombre; ?> 
                                        <strong>-{{$totalimpresoras}} <br></strong>
                                    <?php } ?>
                                      
                                @endforeach


                                </div>
                            </td>
                            
                            <!-- Cambiar la cantidad de consumibles a pedir con el evento javascript BLUR -->
                            <form>
                                    <td class="border border-slate-300 px-6 py-4 ">
                                        <input style="width:150px;height:30px" id="{{ $contador }}" type="number" min="0" name="Cantidad" value="{{$consumible->Cantidad}}" />
                                        
                                        <script>
                                            //Detecta si se pulsa enter 
                                            var y = document.getElementById("{{ $contador }}").addEventListener("keyup", function(event) {
                                            if (event.keyCode === 13) {
                                                var cantidad = document.getElementById("{{ $contador }}").value;

                                                document.cookie = "cantidad="+cantidad;
                                            
                                                var id = "{{ $consumible->Id}}";
                                                document.cookie = "id="+id;

                                                document.location.replace('/inventario/public/consumibles/pasar');

                                            }
                                            });

                                            /*
                                            //Detecta si se sale del foco
                                            var x = document.getElementById("{{ $contador }}").addEventListener("blur", function() {
                                                var cantidad = document.getElementById("{{ $contador }}").value;
                                                document.cookie = "cantidad="+cantidad;
                                                
                                                var id = "{{ $consumible->Id}}";
                                                document.cookie = "id="+id;

                                                document.location.replace('/inventario/public/consumibles/pasar')
                                            });
                                            */

                                        </script>
                                    </td>
                            
                            </form>
                                    <td class="border border-slate-300 px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            @if ($consumible->detalles->count() != 0)
                                                <?php $porrecibir = 0; ?>
                                                @foreach ($consumible->detalles as $detalle)
                                                    <?php $porrecibir += $detalle->Cantidad;?>
                                                @endforeach
                                            @if ($porrecibir != 0)
                                                <p class="text-green-700">{{$porrecibir}} -> ({{$consumible->Equivalencia}})</p>
                                            @endif

                                            @endif
                                        </div>
                                    </td>

                            <form>
                                    <td class="border border-slate-300 px-6 py-4 ">
                                        <input style="width:150px;height:30px" id="{{ $contadorstock }}" type="number" min="0" name="Stock" value="{{$consumible->Stock}}" />
                                        
                                        <script>
                                            //Detecta si se pulsa enter 
                                            var y = document.getElementById("{{ $contadorstock }}").addEventListener("keyup", function(event) {
                                            if (event.keyCode === 13) {
                                                var stock = document.getElementById("{{ $contadorstock }}").value;
                                                document.cookie = "stock="+stock;
                                                
                                                var id = "{{ $consumible->Id}}";
                                                document.cookie = "id="+id;

                                                document.location.replace('/inventario/public/consumibles/stock');
                                            }
                                            });

                                            /*
                                            //Detecta si se sale del foco
                                            var x = document.getElementById("{{ $contadorstock }}").addEventListener("blur", function() {
                                            var stock = document.getElementById("{{ $contadorstock }}").value;
                                            document.cookie = "stock="+stock;
                                            
                                            var id = "{{ $consumible->Id}}";
                                            document.cookie = "id="+id;

                                            document.location.replace('/inventario/public/consumibles/stock');
                                            });
                                            */

                                        </script>
                                    </td>
                            
                            </form>

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
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
        </div>
        <p class="text-green-600">* Pendientes de recibir -> Unidades pendientes altas almacén </p>
    </div>
</x-layout>