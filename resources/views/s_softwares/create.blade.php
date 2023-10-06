<x-layout>
    <form action="{{ url('/softwares') }}" method="POST" enctype="multipart/form-data">
        <x-s_software.form :software="$software" :proveedores="$proveedores" />
    </form>
</x-layout>