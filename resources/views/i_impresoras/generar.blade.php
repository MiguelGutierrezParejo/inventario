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
    <title>Informe de impresoras</title>
</head>

<body>

    <!--Establecer paginación -->
    <script type="text/php">
        if ( isset($pdf) ) {
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("serif");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = $pdf->get_width() - 90;
            $y = $pdf->get_height() - 25;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
    <div>
        <div class="flex">
           <div><img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png' width="20%" height="20%"/></div>
           <div><h4 class="text-right font-semibold">Inventario de impresoras desde {{date('d-m-Y', strtotime($request->Desde))}} hasta el {{date('d-m-Y', strtotime($request->Hasta))}}</h4></div>
        </div>
    @if ($impresoraAlta->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Impresoras de alta: {{$impresoraAlta->count()}}</h2>
            <table class="table-layoit:fixed border border-red-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Referencia</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            @if ($titular == 'Si')
                                <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Usuario</th>
                            @endif
                            <th class="border border-slate-300 px-2 font-semibold">Fecha de alta</th>
                            <th style="text-align: right" class="border border-slate-300 px-2 font-semibold"> Importe Adq</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($impresoraAlta as $mant )
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->modelo->Modelo}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                            @if ($titular == 'Si')
                                <td class="border border-slate-300 px-2 ">{{ $mant->usuario->Nombre}}</td>
                            @endif
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d-m-Y')}}</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ $mant->PrecioAdquisicion}}€</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            @if ($titular == 'Si')
                                <td class="border-none"></td>
                            @endif
                            <td style="text-align: right" class="border border-slate-300 px-2 font-semibold">Total:</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($impresoraAlta->sum('PrecioAdquisicion'), 2, ',', '.')}}€</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <br>
        @endif

        @if ($impresoraBaja->count() > 0 )
        <div>
            <h2 class="text-2xl font-semibold">Impresoras de Baja: {{$impresoraBaja->count()}}</h2>
            <table class="table-layoit:fixed border border-gray-500 border-collapse mt-5">
                <thead>
                    <tr>
                        <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Referencia</th>
                        <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                        <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                        @if ($titular == 'Si')
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Usuario</th>
                        @endif
                        <th class="border border-slate-300 px-2 font-semibold">Fecha de alta</th>
                        <th class="border border-slate-300 px-2 font-semibold">Fecha de baja</th>
                        <th style="text-align: right"class="border border-slate-300 px-2 font-semibold"> Importe Adq</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($impresoraBaja as $mant )
                    <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                        <td class="border border-slate-300 px-2 ">{{ $mant->modelo->Modelo}}</td>
                        <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                        @if ($titular == 'Si')
                            <td class="border border-slate-300 px-2 ">{{ $mant->usuario->Nombre}}</td>
                        @endif
                        <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d-m-Y')}}</td>
                        <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaBaja->format('d-m-Y')}}</td>
                        <td style="text-align: right" class="border border-slate-300 px-2 ">{{ $mant->PrecioAdquisicion}}€</td>
                    </tr>
                    @endforeach
                    <tr>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            @if ($titular == 'Si')
                                <td class="border-none"></td>
                            @endif
                            <td class="border-none"></td>
                            <td style="text-align: right" class="border border-slate-300 px-2 font-semibold">Total:</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($impresoraBaja->sum('PrecioAdquisicion'), 2, ',', '.')}}€</td>
                        </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if ($mantenimientos != null)
        @if ($mantenimientos->count() > 0 )
        <div>
            <h2 class="text-2xl font-semibold">Mantenimiento: {{$mantenimientos->count()}}</h2>
            <table class="table-layoit:fixed border border-gray-500 border-collapse mt-5">
                <thead>
                    <tr>
                        <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Impresora</th>
                        @if ($titular == 'Si')
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Usuario</th>
                        @endif
                        <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Consumible</th>
                        <th style="text-align: center" class="border border-slate-300 px-2 font-semibold">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mantenimientos as $mant )
                    <tr class="border border-slate-400">
                        <td class="border border-slate-300 px-2 ">{{ $mant->impresora->NInventario}}</td>
                        @if ($titular == 'Si')
                            <td class="border border-slate-300 px-2 ">{{ $mant->impresora->usuario->Nombre}}</td>
                        @endif
                        <td class="border border-slate-300 px-2 ">{{ $mant->consumible->Modelo}}</td>
                        <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->Fecha->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @endif
    </div>
</body>
</html>