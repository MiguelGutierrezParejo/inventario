<x-layout>
    <form action="{{  url('/mantequip') . '/' . $mantenimiento->Id }}" method="POST">
        @method('PUT')
        <x-mantenimientoequipos.form :mant="$mantenimiento" :equipo="$equipo" />
    </form>
</x-layout>