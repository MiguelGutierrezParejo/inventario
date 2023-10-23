<x-layout>
    <form action="{{  url('/fotoequip') . '/' . $equipo->Id }}" method="POST" enctype="multipart/form-data">
        <x-fotoequipos.form :foto="$foto" :equipo="$equipo"/>
    </form>
</x-layout>