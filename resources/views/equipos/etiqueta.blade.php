<?php use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Inventario</title>
</head>
<body class="flex justify-center">
    <table class="border-separate border-spacing-2 border border-slate-400">
        <tbody>
            <tr>
                <td class="oculto-impresion">
                    <a href="{{ route('etiquetar', 'Simple') }}"
                        style="background-color: #0053D0" class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
                </td>
                <td class="oculto-impresion">
                    <a id="enlaceconfig" style="background-color: #229954" class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">
                    Ver ajustes de impresión</a>
                    <div id="config" class="hidden">
                        <img src='http://localhost/inventario/public/configuracionimpresora.png' width="300px" height="1000px"/>
                    </div>
                </td>
                
                <script>
                    var enlaceconfig = document.getElementById("enlaceconfig");
                    var config = document.getElementById("config");

                    enlaceconfig.addEventListener("click", function(event) {
                        config.classList.toggle("hidden");
                    });
                </script>

                <tr></tr>
                @foreach ($equipos as $equipo )
                    <td>
                        <table cellspacing="2" cellpadding="2">
                            <tr class="border border-slate-400"> 
                                <td class="w-4/12">
                                    <img src='http://192.168.20.208/inventario/public/logoinformatica.png' width="65px" height="65px"/>
                                </td>
                                <td class="w-4/12" style="text-align: center">
                                    <strong >{{ $equipo->NInventario}}</strong>
                                    <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                </td>
                                <td class="w-4/12">
                                    <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                    @if ($stringSeparado[0] == 'E')
                                        <?php $qrcode = QrCode::size(70)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                        <p>{{$qrcode}}</p>
                                    @elseif ($stringSeparado[0] == 'T')
                                        <?php $qrcode = QrCode::size(75)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                        <p>{{$qrcode}}</p>
                                    @elseif ($stringSeparado[0] == 'I')
                                        <?php $qrcode = QrCode::size(75)->generate("http://localhost/inventario/public/impresoras/$equipo->Id"); ?>
                                        <p>{{$qrcode}}</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                    <tr></tr>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>
