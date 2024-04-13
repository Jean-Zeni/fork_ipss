@section('titulo', 'Editar Igreja')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Igreja : {{$igreja->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('igreja.index') }}" class="btn btn-success">Listar</a>
            <a href="{{ route('igreja.show', ['igreja' =>$igreja]) }}" class="btn btn-secondary">Visualizar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.igreja._form', ['igreja' => $igreja])
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
