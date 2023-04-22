@section('titulo', 'Adicionar Conselho')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Conselho') }}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('conselho.index') }}" class="btn btn-success">Listar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.conselho._form')
                @endcomponent
            </div>
        </div>
        @if($errors->any())
            <h1>Erros</h1>
            @foreach ($errors->all() as $error)
                {{$error}}
                <br>
            @endforeach
        @endif
    </div>

</x-app-layout>
