<x-layout>
    <form action="{{ url('/terminales') . '/' . $terminal->Id }}" method="POST">
        @method('PUT')
        <x-terminales.form :terminal="$terminal" />
    </form>
</x-layout>