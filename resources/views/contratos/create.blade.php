<x-layout>
    <form action="{{ route('contratos.store', ['id' => $contrato->Id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-contratos.form :contrato="$contrato"/>
    </form>
</x-layout>
