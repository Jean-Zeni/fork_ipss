@section('titulo', 'Editar Banner')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Banner : {{$banner->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div class="menu">
            <a href="{{ route('banner.index') }}" class="btn btn-success">Listar</a>
            <a href="{{ route('banner.show', ['banner' =>$banner]) }}" class="btn btn-secondary">Visualizar</a>
        </div>
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.banner._form', ['banner' => $banner])
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
