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
    <title>Factura</title>
</head>

<body>
    <div>
        <div class="flex mb-6">
            <table class="" style="border-bottom: 3px solid black">
                <tbody>
                    <tr class="">
                        <td class="">
                            <img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png'/>
                        </td>
                        <td class="">
                            <strong>Datos del proveedor</strong>
                            <p>Nombre: {{$proveedor->Nombre}}</p>
                            <p>Teléfono: {{$proveedor->Telefono}}</p>
                            <p>Correo: {{$proveedor->Correo}}</p>
                            <p>Fecha: {{$pedido->Fecha->format('d-m-Y')}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div>
            <h3 class=" text-2xl font-semibold">Pedido de consumibles</h2>
            <table class="table-layoit:fixed mt-5" style="border-bottom: 3px solid black">
                    <thead>
                        <tr>
                            <th class="text-align: left px-2 font-semibold">Cantidad</th>
                            <th class="text-align: left px-2 font-semibold">Modelo</th>
                            <th class="text-align: left px-2 font-semibold">Referencia del fabricante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consumibles as $consumible )
                        <tr class="whitespace-nowrap">
                            <td class=" px-2 ">{{ $consumible->Cantidad}}</td>
                            <td class=" px-2 ">{{ $consumible->Modelo}}</td>
                            <td class=" px-2 ">{{ $consumible->Referencia}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
    </div>
</body>
</html>