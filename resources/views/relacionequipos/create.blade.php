<x-layout>
    <form action="{{  url('/relequip') . '/' . $equipo->Id }}" method="POST">
        <x-relacionequipos.form :rel="$relacion" :emp="$empleados" />
    </form>
</x-layout>