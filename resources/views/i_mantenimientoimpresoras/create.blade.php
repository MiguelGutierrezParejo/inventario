<x-layout>
    <form action="{{  url('/mantenimientoimpresoras') }}" method="POST">
        <x-i_mantenimientoimpresoras.form :mantenimiento="$mantenimiento" :relaciones="$relaciones" :idimpresora=$idimpresora />
    </form>
</x-layout>