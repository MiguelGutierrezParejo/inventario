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
    <title>Informe de Lineas</title>
</head>

<body>
    <div>
        <div class="flex">
           <div><img src='http://localhost/inventario/public/Gmu_trans_Horizontal.png' width="20%" height="20%"/></div>
           <div><h4 class="text-right font-semibold">Inventario de lineas desde {{$request->Desde}} hasta {{date('d-m-Y', strtotime($request->Hasta))}}</h4></div>
        </div>
        

    @if ($equipoAlta->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold">Lineas de alta: {{$equipoAlta->count()}}</h2>
            <table class="table-layoit:fixed border border-red-500 border-collapse mt-5">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 px-2 font-semibold">Referencia</th>
                            <th class="border border-slate-300 px-2 font-semibold">Titular</th>
                            <th class="border border-slate-300 px-2 font-semibold">Numero</th>
                            <th class="border border-slate-300 px-2 font-semibold">Extension</th>
                            <th class="border border-slate-300 px-2 font-semibold">Nº Tarjeta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipoAlta as $mant )
                        <tr class="border border-slate-400">
                            <td class="border border-slate-300 px-2 ">{{ $mant->NInventario}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->lineas->last()->usuario->Nombre}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Numero}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Extension}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumTarjeta}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <br>
        @endif

        @if ($equipoBaja->count() > 0 )
        <div>
            <h2 class="text-2xl font-semibold">Lineas de Baja: {{$equipoBaja->count()}}</h2>
            <table class="table-layoit:fixed border border-gray-500 border-collapse mt-5">
                    <thead>
                        <tr >
                            <th class="border border-slate-300 px-2 font-semibold">Linea</th>
                            <th class="border border-slate-300 px-2 font-semibold">Titular</th>
                            <th class="border border-slate-300 px-2 font-semibold">Numero</th>
                            <th class="border border-slate-300 px-2 font-semibold">Extension</th>
                            <th class="border border-slate-300 px-2 font-semibold">Nº Tarjeta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Alta</th>
                            <th class="border border-slate-300 px-2 font-semibold">Fecha Baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipoBaja as $mant )
                        <tr class="whitespace-nowrap border border-slate-400">
                            <td class="border border-slate-300 px-2 ">L-{{ $mant->Id}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->lineas->last()->usuario->Nombre}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Numero}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->Extension}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->NumTarjeta}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FechaAlta->format('d/m/Y')}}</td>
                            <td class="border border-slate-300 px-2 ">{{ $mant->FechaBaja->format('d/m/Y')}}</td>
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