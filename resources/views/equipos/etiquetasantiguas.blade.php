<?php

use App\Models\RelacionLinea;
use App\Models\RelacionTerminal;
use App\Models\Linea;
use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Inventario</title>
</head>
<body class="flex justify-center">
    <table class="border-separate border-spacing-2 border border-slate-400">
        <thead>
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
        </thead>
        <tbody>
            <tr>
                @foreach ($equipos as $equipo )
                    @if ($tipo == 'Reducido') <!-- Tipo de etiqueta reducida -->
                        <td>
                            <table cellspacing="2" cellpadding="2">
                                <tr class="border border-slate-400">
                                    <td class="w-4/12" style="text-align: center">
                                        <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                        @if ($stringSeparado[0] == 'T')
                                            <?php
                                            $relacionterminal = RelacionTerminal::where('IdTerminal', $equipo->Id)->first();
                                            $relacionlineas = RelacionLinea::where('IdUsuario', $relacionterminal->IdUsuario)->first();
                                            ?>
                                            <strong>{{ $equipo->NInventario}}</strong>
                                            <p class="mt-2">{{ $relacionlineas->linea->Numero }}</p>
                                            <p class="mt-2">{{ $relacionlineas->linea->Extension }}</p>
                                        @elseif ($stringSeparado[0] == 'L')
                                            <?php
                                            $numerolinea = Linea::where('Id', $equipo->Id)->first();
                                            ?>
                                            <strong>{{ $equipo->NInventario}}</strong>
                                            <p class="mt-2">{{ $numerolinea->Numero }}</p>
                                            <p class="mt-2">{{ $numerolinea->Extension }}</p>
                                        @else
                                            <strong>{{ $equipo->NInventario}}</strong>
                                            <p style="font-size: 8px;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <tr></tr>
                    @endif
                @endforeach
            </tr>
        </tbody>
    </table>
</body>
