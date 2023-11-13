<x-layout>
    <form action="{{ route('modelos.store', ['id' => $modelo->Id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-modelos.form :modelo="$modelo"/>
    </form>
</x-layout>
