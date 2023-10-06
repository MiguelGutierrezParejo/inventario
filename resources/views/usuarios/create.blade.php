<x-layout>
    <form action="{{  url('/usuarios') }}" method="POST">
        <x-usuarios.form :usuario="$usuario" />
    </form>
</x-layout>
