<x-layout>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del consumible</strong>
            <a href="/inventario/public/consumibles/edit/{{ $consumible->Id }}" style="background-color: #0053D0"
                class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1">Editar</a>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Id:
            <span class="font-thin">{{ $consumible->Id }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Modelo consumible:
            <span class="font-thin"><a>{{$consumible->Modelo}}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Referencia:
            <span class="font-thin"><a>{{$consumible->Referencia}}</a></span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Páginas:
            <span class="font-thin">{{ $consumible->Paginas }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Precio:
            <span class="font-thin">{{ $consumible->Precio }}€</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Cantidad:
            <span class="font-thin">{{ $consumible->Cantidad }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Baja:
            @if ($consumible->Bajas == 0)
                <span class="font-thin">No</span>
            @else
                <span class="font-thin">Si</span>
            @endif
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Equivalencia:
            <span class="font-thin">{{ $consumible->Equivalencia }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Stock minimo:
            <span class="font-thin">{{ $consumible->Stockminimo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $consumible->Observaciones }}</span>
        </h3>
    </div>
    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/consumibles" style="border-color:#0053D0; background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>

</x-layout>