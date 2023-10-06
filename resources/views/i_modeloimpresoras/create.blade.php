<x-layout>
    <form action="{{  url('/modeloimpresoras') }}" method="POST">
        <x-i_modeloimpresoras.form :modeloimpresora="$modeloimpresora" />
    </form>
</x-layout>