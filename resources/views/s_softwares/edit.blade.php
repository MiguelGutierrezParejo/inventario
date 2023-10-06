<x-layout>
    <form action="{{ url('/softwares') . '/' . $software->Id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <x-s_software.form :software="$software" :proveedores="$proveedores" />
    </form>
</x-layout>