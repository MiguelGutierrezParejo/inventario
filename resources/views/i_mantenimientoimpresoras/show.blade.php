<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl">Datos del mantenimiento:</h1>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Id:
            <span class="font-thin">{{ $mantenimiento->Id }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Impresora:
            <span class="font-thin"><a>{{$mantenimiento->impresora->NInventario}}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Consumible:
            <span class="font-thin"><a>{{$mantenimiento->consumible->Modelo}}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha:
            <span class="font-thin">{{ $mantenimiento->Fecha->format('d-m-Y') }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $mantenimiento->Observaciones }}</span>
        </h3>
    </div>
    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/mantenimientoimpresoras"
            style="background-color: #0053D0" class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>
</x-layout>