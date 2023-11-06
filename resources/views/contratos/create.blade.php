<x-layout>
    <form action="{{ route('contratos.store', ['id' => $contrato->Id]) }}" method="POST" enctype="multipart/form-data">
        <x-contratos.form :contrato="$contrato"/>
    </form>
</x-layout>
