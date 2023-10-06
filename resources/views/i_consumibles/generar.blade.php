<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    <!-- <link rel="stylesheet" href="/var/www/html/inventario/public/css/app.css"> -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Informe de Equipos</title>
</head>

<body>
    <div>
    <!--   
    <div class="flex">
           <div><img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png'/></div>
        </div>
-->
        <div>
            <h3 class=" text-2xl font-semibold">Listado de consumibles</h2>
            <table class="table-layoit:fixed mt-1">
                    <thead>
                        <tr>
                            <th class="px-2 font-semibold">Impresoras</th>
                            <th class="px-2 font-semibold">Pendiente*</th>
                            <th class="px-2 font-semibold">Stock</th>
                            <th class="px-2 font-semibold">Modelo</th>
                            <th class="px-2 font-semibold">Referencia del fabricante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consumibles as $consumible )
                        <tr class="whitespace-nowrap">
                            <td class=" px-2 ">
                            <?php $totalimpresoras = 0 ?>
                                <!-- Recorrer todas las relaciones con modelos que tiene un consumible-->

                                @foreach ($consumible->relaciones as $relacion)
                                    <!-- Sumar a $totalimpresoras todas las impresoras que tiene el modelo asociado al consumible -->
                                    <?php $totalimpresoras += $relacion->modelo->impresoras->count()?>
                                @endforeach

                                {{$totalimpresoras}}
                            </td>
                            <td class=" px-2 ">
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
                            <td class=" px-2 ">{{ $consumible->Stock}}</td>
                            <td class=" px-2 ">{{ $consumible->Modelo}}</td>
                            <td class=" px-2 ">{{ $consumible->Referencia}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <br>
            <p>* Pendientes de recibir -> Unidades pendientes altas almacén </p>
        </div>
        <!--<br>-->
    </div>
</body>
</html>