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
                <?php $contador = 0; ?>
                <?php $contadormenorque3o8 = 0; ?>
                @foreach ($equipos as $equipo )
                    @if ($tipo == 'Reducido') <!-- Tipo de etiqueta reducida -->
                        <?php $contador += 1; ?>
                        @if($contador <= 3 )
                            <td>
                                <table cellspacing="2" cellpadding="2">
                                    <tr class="border border-slate-400"> 
                                        <td class="border border-slate-400" style="text-align: center">
                                            <strong >{{ $equipo->NInventario}}</strong>
                                            <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                            @if ($stringSeparado[0] == 'T')
                                                <?php
                                                $relacionterminal = RelacionTerminal::where('IdTerminal', $equipo->Id)->first();
                                                $relacionlineas = RelacionLinea::where('IdUsuario', $relacionterminal->IdUsuario)->first();
                                                dd($relacionlineas->linea->Numero);

                                                ?>
                                                <p style="font-size: 0.7em;" class="mt-2">{{ $relacionlineas->linea->Numero}}</p>
                                            @elseif ($stringSeparado[0] == 'L')
                                                <?php
                                                $numerolinea = Linea::where('Id', $equipo->Id)->first();
                                                dd($numerolinea->Numero);
                                                ?>
                                                <p style="font-size: 0.7em;" class="mt-2">{{ $numerolinea }}</p>
                                            @endif
                                            <p style="font-size: 0.8em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                        </td>
                                    </tr> 
                                </table>
                            </td>                              
                        @else 
                            <tr class="border border-slate-400">
                                <td style="height: 1em;"></td>
                            </tr>

                            <?php $contador = 1;  ?>
                            
                            <td>
                                <table cellspacing="2" cellpadding="2">
                                    <tr class="border border-slate-400">
                                        <td style="text-align: center">
                                            <strong >{{ $equipo->NInventario}}</strong>
                                            <p style="font-size: 8px;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        @endif
                        
                    @else <!-- Tipo de etiqueta completa -->
                        <!-- Para el fallo de ser menos de 3 -->
                        @if ($equipos->count() < 3)
                            <?php $contadormenorque3o8 += 1; ?>
                            <!-- Etiqueta grande para menor que 3 -->
                            @if($equipos->count() == 1 )
                                <td>
                                    <table cellspacing="2" cellpadding="2">
                                        <tr class="border border-slate-400"> 
                                            <td class="w-4/12">
                                                <img src='http://localhost/inventario/public/logoinformaticac.png'/>
                                            </td>
                                            <td class="w-4/12" style="text-align: center">
                                                <strong >{{ $equipo->NInventario}}</strong>
                                                <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                            </td>
                                            <td class="w-4/12">
                                                <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                                @if ($stringSeparado[0] == 'E')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'T')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'I')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'L')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/lineas/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @endif
                                            </td>
                                        </tr> 
                                    </table>
                                </td>                             
                            @else 
                                @if ($contadormenorque3o8 == 1)
                                <td>
                                    <table cellspacing="2" cellpadding="2">
                                        <tr class="border border-slate-400"> 
                                            <td class="w-4/12">
                                                <img src='http://localhost/inventario/public/logoinformaticac.png'/>
                                            </td>
                                            <td class="w-4/12" style="text-align: center">
                                                <strong >{{ $equipo->NInventario}}</strong>
                                                <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                            </td>
                                            <td class="w-4/12">
                                                <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                                @if ($stringSeparado[0] == 'E')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'T')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'I')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @endif
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                                @elseif ($contadormenorque3o8 == 2)
                                <td>
                                    <table cellspacing="2" cellpadding="2">
                                        <tr class="border border-slate-400"> 
                                            <td class="w-4/12">
                                                <img src='http://localhost/inventario/public/logoinformaticac.png'/>
                                            </td>
                                            <td class="w-4/12" style="text-align: center">
                                                <strong >{{ $equipo->NInventario}}</strong>
                                                <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                            </td>
                                            <td class="w-4/12">
                                                <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                                @if ($stringSeparado[0] == 'E')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'T')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'I')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @endif
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                                @endif
                            @endif
                        @else
                            <?php $contador += 1; ?>
                            @if($contador <= 3 )
                                <td>
                                    <table cellspacing="2" cellpadding="2">
                                        <tr class="border border-slate-400"> 
                                            <td class="w-4/12">
                                                <img src='http://localhost/inventario/public/logoinformaticac.png'/>
                                            </td>
                                            <td class="w-4/12" style="text-align: center">
                                                <strong >{{ $equipo->NInventario}}</strong>
                                                <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                            </td>
                                            <td class="w-4/12">
                                                <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                                @if ($stringSeparado[0] == 'E')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'T')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'I')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @endif
                                        </td>
                                        </tr> 
                                    </table>
                                </td>                          
                            @else 
                                <tr class="border border-slate-400">
                                    <td style="height: 1em;"></td>
                                </tr>

                                <?php $contador = 1;  ?>
                                
                                <td>
                                    <table cellspacing="2" cellpadding="2">
                                        <tr class="border border-slate-400"> 
                                            <td class="w-4/12">
                                                <img src='http://localhost/inventario/public/logoinformaticac.png'/>
                                            </td>
                                            <td class="w-4/12" style="text-align: center">
                                                <strong >{{ $equipo->NInventario}}</strong>
                                                <p style="font-size: 0.5em;" class="mt-2">{{date('d-m-Y' , strtotime($equipo->FechaAlta))}}</p>
                                            </td>
                                            <td class="w-4/12">
                                                <?php  $stringSeparado = explode('-', $equipo->NInventario); ?>
                                                @if ($stringSeparado[0] == 'E')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/equipos/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'T')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @elseif ($stringSeparado[0] == 'I')
                                                    <?php $qrcode = QrCode::size(80)->generate("http://localhost/inventario/public/terminales/$equipo->Id"); ?>
                                                    <p>{{$qrcode}}</p>
                                                @endif
                                            </td>
                                        </tr> 
                                    </table>
                                </td>
                            @endif
                        @endif
                    @endif
                @endforeach
            </tr>
        </tbody>
    </table>
</body>
