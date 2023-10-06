<x-layout>
    <form action="{{  url('/mantequip') . '/' . $equipo->Id }}" method="POST">
        <x-mantenimientoequipos.form :mant="$mantenimiento" :equipo="$equipo"/>
    </form>
</x-layout>