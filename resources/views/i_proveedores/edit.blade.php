<x-layout>
    <form action="{{ url('/proveedores') . '/' . $proveedor->Id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <x-i_proveedores.form :proveedor="$proveedor" />
    </form>
</x-layout>