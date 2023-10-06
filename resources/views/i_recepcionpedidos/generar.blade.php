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
    <title>Albaran</title>
</head>

<body>
    <div>
        <div class="flex">
           <div><img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png'/></div>
           <div><h4 class="text-right font-semibold">{{$Fecha }}</h4></div>
        </div>
    
        <div>
            <h3 class=" text-2xl font-semibold">Albarán</h2>
            <table class="table-layoit:fixed mt-5">
                    <thead>
                        <tr>
                            <th class="border px-2 font-semibold">Cantidad Recibida</th>
                            <th class="border px-2 font-semibold">Id pedido</th>
                            <th class="border px-2 font-semibold">Referencia del consumible</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recepcionados as $recepcionado )
                        <tr class="whitespace-nowrap">
                            <td class="border px-2 ">{{ $recepcionado->CantidadARecepcionar}}</td>
                            <td class="border px-2 ">{{ $recepcionado->IdPedido}}</td>
                            <td class="border px-2 ">{{ $recepcionado->consumible->Modelo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
    </div>
</body>
</html>