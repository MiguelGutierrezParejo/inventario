<x-layout>
    <form action="{{ route('fotoequipos.store', ['id' => $modelo->Id]) }}" method="POST" enctype="multipart/form-data">
        <x-fotoequipos.form :foto="$foto" :modelo="$modelo"/>
    </form>
</x-layout>
