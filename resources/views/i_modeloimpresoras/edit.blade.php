<x-layout>
    <form action="{{  url('/modeloimpresoras')  . '/' . $modeloimpresora->Id  }}" method="POST">
    @method('PUT')
        <x-i_modeloimpresoras.form :modeloimpresora="$modeloimpresora" />
    </form>
</x-layout>