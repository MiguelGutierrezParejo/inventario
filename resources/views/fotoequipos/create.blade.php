<x-layout>
    <form action="{{ route('fotoequipos.store', ['id' => $equipo->Id]) }}" method="POST" enctype="multipart/form-data">
        <x-fotoequipos.form :foto="$foto" :equipo="$equipo"/>
    </form>
</x-layout>
