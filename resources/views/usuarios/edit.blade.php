<x-layout>
    <form action="{{  url('/usuarios') . '/' . $usuario->Id }}" method="POST">
        @method('PUT')
        <x-usuarios.form :usuario="$usuario"/>
    </form>
</x-layout>