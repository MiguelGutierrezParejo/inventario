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
    <title>Informe de Equipos</title>

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
                <h4 class="pdf text-right font-semibold">Inventario de equipos desde {{date('d-m-Y', strtotime($request->Desde))}} hasta el {{date('d-m-Y', strtotime($request->Hasta))}}</h4>
            </div>
        </div>
    @if ($equipoAlta->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Equipos de alta: ({{$equipoAlta->count()}})</h2>
            <table class="table-layoit:fixed border border-red-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Referencia</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th style="text-align: right" class="border border-slate-300 px-2 font-semibold">Importe Adq</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipoAlta as $mant )
                        <tr class="border border-slate-400">
                            <td class="texto border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Modelo}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($mant->PrecioAdquisicion, 2, ',', '.')}}€</td>
                            
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td style="text-align: right" class="border border-slate-300 px-2 font-semibold">Total:</td>
                            <td style="text-align: right" class="border border-slate-300 px-2 ">{{ number_format($equipoAlta->sum('PrecioAdquisicion'), 2, ',', '.')}}€</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <br>
        @endif

        @if ($equipoBaja->count() > 0 )
        <div>
            <h2 class="text-2xl font-semibold">Equipos de Baja: ({{$equipoBaja->count()}})</h2>
            <table class="table-layoit:fixed border border-gray-500 border-collapse mt-5">
                    <thead>
                        <tr >
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Equipo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Titular</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Fabricante</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Modelo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipoBaja as $mant )
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->relaciones->last()->usuario->Nombre}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Fabricante}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Modelo}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumSerie}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            <td style="text-align: center" class="border border-slate-300 px-2 ">{{ $mant->FechaBaja->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
        @endif

        @if ($componenteAlta != null)
        @if ($componenteAlta->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Mantenimiento de alta: ({{$componenteAlta->count()}})</h2>
            <table class="border border-gray-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Equipo</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Elemento</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Características</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Fabricante</th>
                            <th style="text-align: left" class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($componenteAlta as $mant )
                           
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-2">{{ $mant->equipo->NInventario }}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Nombre}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Caracteristicas}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Fabricante}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->NumSerie}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
        @endif
        @endif

        @if ($componenteAlta != null)
        @if ($componenteBaja->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Mantenimiento de baja: ({{$componenteBaja->count()}})</h2>
            <table class="border border-gray-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 px-2 font-semibold">Equipo</th>
                            <th class="border border-slate-300 px-2 font-semibold">Elemento</th>
                            <th class="border border-slate-300 px-2 font-semibold">Características</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fabricante</th>
                            <th class="border border-slate-300 px-2 font-semibold">Nº Serie</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($componenteBaja as $mant )
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-2">{{ $mant->equipo->NInventario }}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Nombre}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Caracteristicas}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->Fabricante}}</td>
                            <td class="border border-slate-300 px-2">{{ $mant->NumSerie}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            @if ($mant->FechaBaja)
                                <td class="border border-slate-300 px-2 ">{{ $mant->FechaBaja->format('d/m/Y') }}</td>
                            @else 
                                <td class="border border-slate-300 px-2 ">{{ $mant->FechaBaja }}</td>
                            @endif
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