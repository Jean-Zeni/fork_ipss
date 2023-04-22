@section('titulo', 'Editar Membro')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Membro : {{$membro->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('membro.index') }}" class="btn btn-success">Listar</a>
            <a href="{{ route('membro.show', ['membro' =>$membro]) }}" class="btn btn-secondary">Visualizar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.membro._form', ['membro' => $membro, 'conselhos' => $conselhos])
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
