<x-layout>
    <form action="{{ url('/proveedores') }}" method="POST" enctype="multipart/form-data">
        <x-i_proveedores.form :proveedor="$proveedor" />
    </form>
</x-layout>