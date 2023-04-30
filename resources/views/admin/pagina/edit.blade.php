@section('titulo', 'Editar Página')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Página : {{$pagina->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('pagina.index') }}" class="btn btn-success">Listar</a>
            <a href="{{ route('pagina.show', ['pagina' =>$pagina]) }}" class="btn btn-secondary">Visualizar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.pagina._form', ['pagina' => $pagina])
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
