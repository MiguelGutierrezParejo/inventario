<x-layout>
    <form action="{{  url('/pedidos') }}" method="POST">
        <x-i_pedidos.form :pedido="$pedido" :consumiblesapedir="$consumiblesapedir" :proveedor="$proveedor" :sumatoriocompleto="$sumatoriocompleto" :descuento=$descuento 
        :sumatoriomenosdescuento=$sumatoriomenosdescuento :iva=$iva />
    </form>
</x-layout>