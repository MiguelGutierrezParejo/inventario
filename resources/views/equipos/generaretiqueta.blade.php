<?php 
namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>

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
</head>
<body>
    <div>
        <div>
            {{dd($qrcode)}}
            <table class="table-layoit:fixed border border-red-500 border-collapse mt-5">
                <tbody>
                    <tr class="border border-slate-400">
                        <?php $contador = 0; ?>
                        @foreach ($equipos as $equipo )
                            <?php $contador += 1; ?>
                            @if($contador <= 3 )              
                                <td class="border border-slate-300 px-2 ">
                                    <div>
                                        <div style="width:100%;height:5%;">
                                            <img style="width:25%;height:100%;" src='http://localhost/inventario/public/logoinformaticae.png' width="50px"/>
                                            <p style="float:right; width:70%;height:100%;">{{ $equipo->NInventario}} <br>{{$equipo->FechaAlta->format('d/m/Y')}}</p>
                                            
                                        </div>
                                    </div>
                                </td>
                            @else

                                <tr></tr>
                                <?php $contador = 1;  ?>
                                <td class="border border-slate-300 px-2 ">
                                    <div>
                                    <div style="width:100%;height:5%;">
                                            <img style="width:25%;height:100%;" src='http://localhost/inventario/public/logoinformaticae.png' width="50px"/>
                                            <p style="float:right; width:70%;height:100%;">{{ $equipo->NInventario}} <br>{{$equipo->FechaAlta->format('d/m/Y')}}</p>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>