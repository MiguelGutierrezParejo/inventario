<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Informe de terminales</title>
</head>

<body>

<!--Establecer paginación -->
    <script type="text/php">
        if ( isset($pdf) ) {
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("arial");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = $pdf->get_width() - 90;
            $y = $pdf->get_height() - 25;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
    <div>
        <div class="flex">
            <div><img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png' width="20%" height="20%"/></div>
            <div>
                <h4 class="text-right font-semibold">Inventario de Terminales desde {{$request->Desde}} hasta {{date('d-m-Y', strtotime($request->Hasta))}}</h4>
            </div>
        </div>
        

    @if ($terminalAlta->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Terminales de alta: {{$terminalAlta->count()}}</h2>
            <table class="table-layoit:fixed border border-red-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Referencia</th>
                            @if ($titular == 'Si')
                                <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Titular</th>
                            @endif
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Marca</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Formato Tarjeta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th style="text-align: right" class="border border-slate-300 px-2 font-semibold">Importe Adq</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terminalAlta as $mant )
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                            @if ($titular == 'Si')
                                <td class="border border-slate-300 px-2 ">{{$mant->terminales->last()->usuario->Nombre}}</td>
                            @endif
                            <td class="border border-slate-300 px-2 ">{{ $mant->Marca}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Modelo}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FormatoTarjeta}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($mant->PrecioAdquisicion, 2, ',', '.')}}€</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border-none"></td>
                            @if ($titular == 'Si')
                                <td class="border-none"></td>
                            @endif
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td style="text-align: right" class="border border-slate-300 px-2 font-semibold">Total:</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($terminalAlta->sum('PrecioAdquisicion'), 2, ',', '.')}}€</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <br>
        @endif

        @if ($terminalBaja->count() > 0 )
        <div>
            <h2 class="text-2xl font-semibold">Terminales de Baja: {{$terminalBaja->count()}}</h2>
            <table class="table-layoit:fixed border border-gray-500 border-collapse mt-5">
                    <thead>
                        <tr >
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Terminal</th>
                            @if ($titular == 'Si')
                                <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Titular</th>
                            @endif
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Marca</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Formato Tarjeta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terminalBaja as $mant )
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-2 ">T-{{ $mant->Id}}</td>
                            @if ($titular == 'Si')
                                <td class="border border-slate-300 px-2 ">{{ $mant->terminales->last()->usuario->Nombre}}</td>
                            @endif
                            <td class="border border-slate-300 px-2 ">{{ $mant->Marca}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Modelo}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FormatoTarjeta}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaBaja->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
        @endif
    </div>
</body>
</html>