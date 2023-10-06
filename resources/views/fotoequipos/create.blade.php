<x-layout>
    <form action="{{  url('/fotoequip') . '/' . $equipo->Id }}" method="POST">
        <x-fotoequipos.form :foto="$foto" :equipo="$equipo"/>
    </form>
</x-layout>