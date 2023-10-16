<?php
use App\Models\I_impresora; 
?>
<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Etiquetar</h1>
        <div>
            <div class="p-2 text-right">
                @if ($tipourl == 'Todo')
                    <a href="/inventario/public/etiquetar/Simple"
                        style="background-color: #7b241c " class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center"> Ver sin etiquetar
                    </a> &nbsp; | &nbsp;
                @else
                    <a href="/inventario/public/etiquetar/Todo"
                        style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Ver todos
                    </a> &nbsp; | &nbsp;
                @endif
                <a href="/inventario/public/etiquetar/{{$tipourl}}"
                    style="background-color: #0053D0" class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Limpiar filtro
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/generaretiqueta/Completo/Etiquetadora"
                    style="background-color:  #0b5345 " class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Etiqueta
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/generaretiqueta/Completo/Impresora"
                    style="background-color:  #0b5345 " class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Etiqueta A4
                </a> &nbsp; | &nbsp;
                <a href="/inventario/public/equipos/generaretiqueta/Reducido/Impresora"
                    style="background-color:  #0b5345 " class="text-white font-semibold rounded-lg text-sm px-5 py-1 text-center">Etiqueta reducida
                </a>

                <p class="text-left">**Aparecen {{ count($objeto) }} instancias de {{ $total }}**</p>
            </div>
            <table width="100%" class="border-collapse border border-slate-400 text-left"  >
                <thead class="bg-gray-100">
                        @php
                            $link = e("Nombre=" . request('Nombre') . "&NInventario=" . request('NInventario') . "&IdTipo=" . request('IdTipo') 
                            . "&NombreOrdenador=" . request('NombreOrdenador') . "&Modelo=" . request('Modelo') . "&FechaAlta=" . request('FechaAlta') 
                            . "&FechaBaja=" . request('FechaBaja') . "&PrecioAdquisicion=" . request('PrecioAdquisicion'));

                            $enlace = e("/inventario/public/etiquetar/$tipourl");
                        @endphp
                
                    <tr>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NInventario&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Referencia
                                @if (request('orden') == 'NInventario') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=Nombre&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Nombre
                                @if (request('orden') == 'Nombre') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=NombreOrdenador&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Nombre del equipo
                                @if (request('orden') == 'NombreOrdenador') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th class="border border-slate-300 px-6 py-2 font-semibold">
                            <a href="{!! $enlace !!}?orden=IdTipo&dir={{request('dir') == 'asc' ? 'desc' : 'asc' }}&{!! $link !!}">Tipo
                                @if (request('orden') == 'IdTipo') @if (request('dir', 'asc') == 'asc') &darr; @else &uarr; @endif @endif
                            </a>
                        </th>
                        <th  style="width:50px;" class="border border-slate-300 px-6 py-2 font-semibold">
                            Etiquetar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                            {{-----------------------------------------BUSQUEDA---------------------------------------------------------------}}
                        <tr class="border border-slate-400 text-center  bg-gray-50 ">
                            <form id="form" action="{{ $enlace }}" method="GET">
                                <input type="hidden" name="orden" value="{{ old('orden') }}">
                                <input type="hidden" name="dir" value="{{ old('dir') }}">
                                <td class="border">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="NInventario" id="NInventario" 
                                    value="{{ request()->query('NInventario') }}">
                                </td>
                                <td class="border border-slate-300 ">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="Nombre" id="Nombre" 
                                    value="{{ request()->query('Nombre') }}">
                                </td>  
                                <td class="border border-slate-300 ">
                                    <input type="text" class="border border-slate-300 px-6 py-2" name="NombreOrdenador" id="NombreOrdenador" 
                                    value="{{ request()->query('NombreOrdenador') }}">
                                </td>
                                <td>
                                    <select type="text" class="border border-slate-300 px-6 py-2" name="IdTipo" id="IdTipo" value="{{ request()->query('IdTipo') }}">
                                        <option selected>{{ request()->query('IdTipo') }}</option>
                                        @foreach ($tipos as $tipo)
                                            @if (request()->query('IdTipo') != $tipo->Denominacion)
                                            <option value="{{ $tipo->Denominacion }}">{{ $tipo->Denominacion }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>  
                                <td class="border border-slate-300 px-6 py-4 ocultar">
                                    <div class="hidden"><button type="submit"></button></div>
                                </td>
                            </form>
                        </tr>
                            {{-----------------------------------------FIN BUSQUEDA---------------------------------------------------------------}}
                    
                    <?php $contador = 0; ?>
                    @foreach ($objeto as $object)
                    <?php $contador += 1; ?> 
                        <tr class=" border border-slate-400">
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @if ($object->Denominacion == 'Ordenador' or $object->Denominacion == 'Monitor')
                                        <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->NInventario }}</a>
                                    @elseif ($object->Denominacion == 'Terminal')
                                        <a href="/inventario/public/terminales/{{$object->Id}}">{{ $object->NInventario }}</a>
                                    @elseif ($object->Denominacion == 'Impresora')
                                        <a href="/inventario/public/impresoras/{{$object->Id}}">{{ $object->NInventario }}</a>
                                    @elseif ($object->Denominacion == 'Linea')
                                        <a href="/inventario/public/lineas/{{$object->Id}}">{{ $object->NInventario }}</a>
                                    @elseif ($object->Denominacion == 'Escaner')
                                        <a href="">{{ $object->NInventario }}</a>
                                    @elseif ($object->Denominacion == 'Tablet')
                                        <a href="">{{ $object->NInventario }}</a>
                                    @endif
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @if ($object->Denominacion == 'Ordenador' or $object->Denominacion == 'Monitor')
                                        <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->Nombre }}</a>
                                    @elseif ($object->Denominacion == 'Terminal')
                                        <a href="/inventario/public/terminales/{{$object->Id}}">{{ $object->Nombre }}</a>
                                    @elseif ($object->Denominacion == 'Impresora')
                                        <a href="/inventario/public/impresoras/{{$object->Id}}">{{ $object->Nombre }}</a>
                                    @elseif ($object->Denominacion == 'Linea')
                                        <a href="/inventario/public/lineas/{{$object->Id}}">{{ $object->Nombre }}</a>
                                    @elseif ($object->Denominacion == 'Escaner')
                                        <a href="">{{ $object->Nombre }}</a>
                                    @elseif ($object->Denominacion == 'Tablet')
                                        <a href="">{{ $object->Nombre }}</a>
                                    @endif
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @if ($object->Denominacion == 'Ordenador' or $object->Denominacion == 'Monitor')
                                        <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->NombreOrdenador }}</a>
                                    @elseif ($object->Denominacion == 'Terminal')
                                        <a href="/inventario/public/terminales/{{$object->Id}}">{{ $object->NombreOrdenador }}</a>
                                    @elseif ($object->Denominacion == 'Linea')
                                        <a href="/inventario/public/lineas/{{$object->Id}}">{{ $object->NombreOrdenador }}</a>
                                    @elseif ($object->Denominacion == 'Escaner')
                                        <a href="">{{ $object->NombreOrdenador }}</a>
                                    @elseif ($object->Denominacion == 'Tablet')
                                        <a href="">{{ $object->NombreOrdenador }}</a>
                                    @elseif ($object->Denominacion == 'Impresora')
                                        <a href="/inventario/public/impresoras/{{$object->Id}}">{{ $object->NombreOrdenador }}</a>
                                        <?php 
                                        $impresora = I_impresora::where('NInventario', $object->NInventario)->first();
                                        ?>
                                        <a href="/inventario/public/impresoras/{{$object->Id}}">{{$impresora->modelo->Modelo }}</a>
                                    @endif
                                </div>
                            </td>
                            <td class="border border-slate-300 px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <a href="/inventario/public/equipos/{{$object->Id}}">{{ $object->Denominacion }}</a>
                                </div>
                            </td>
                            <td align="center" >
                                <?php  $stringSeparado = explode('-', $object->NInventario); ?>
                                @if ($object->Etiquetar == 1)
                                    <input type="checkbox" id="{{ $contador }}" value="{{$stringSeparado[0]}}-{{$object->Id}}" checked>
                                @else 
                                <input type="checkbox" id="{{ $contador }}" value="{{$stringSeparado[0]}}-{{$object->Id}}">
                                @endif
                                <script>
                                    //Detecta cambia checkbox 
                                    var y = document.getElementById("{{ $contador }}").addEventListener("change", function(event) {       
                                    if($("#{{$contador}}"). prop("checked") == true){
                                        var idaetiquetar = document.getElementById("{{ $contador }}").value
                                        
                                        document.cookie = "idaetiquetar="+idaetiquetar+ "; path=/inventario/public" + ';max-age=1';

                                        document.location.replace('/inventario/public/equipos/etiquetar/{{ $tipourl}}');
                                    } else if($("#{{$contador}}"). prop("checked") == false) {
                                        var idaquitar = document.getElementById("{{ $contador }}").value
                                        document.cookie = "idaquitar="+idaquitar + "; path=/inventario/public" + ';max-age=1';
                                        
                                        document.location.replace('/inventario/public/equipos/etiquetar/{{ $tipourl}}');
                                    }

                                    });    

                                        
                                </script>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>