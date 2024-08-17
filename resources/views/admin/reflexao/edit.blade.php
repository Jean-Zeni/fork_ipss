@section('titulo', 'Editar Reflexao')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Reflexão : {{$reflexao->nome}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('reflexao.index') }}" class="btn btn-success">Listar</a>
            <a href="{{ route('reflexao.show', ['reflexao' =>$reflexao]) }}" class="btn btn-secondary">Visualizar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.reflexao._form', ['reflexao' => $reflexao, 'membros' => $membros])
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
