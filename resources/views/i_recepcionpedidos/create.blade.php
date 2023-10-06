<x-layout>
    <form action="{{  url('/recepcion') }}" method="POST" enctype="multipart/form-data">
        <x-i_recepcionpedidos.form :recepcion="$recepcion" :pedido="$pedido" />
    </form>
</x-layout>