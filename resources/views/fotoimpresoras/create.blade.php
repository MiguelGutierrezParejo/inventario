<x-layout>
    <form action="{{ route('fotoimpresoras.store', ['id' => $modelo->Id]) }}" method="POST" enctype="multipart/form-data">
        <x-fotoimpresoras.form :foto="$foto" :modelo="$modelo"/>
    </form>
</x-layout>
