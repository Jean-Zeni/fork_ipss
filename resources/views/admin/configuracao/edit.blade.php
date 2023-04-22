@section('titulo', 'Informações da IPSS')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Informações da IPSS
        </h2>
    </x-slot>
    <div class="container margin40T">
        <br><br>
        <div class="informacao-pagina">
            <div>
                @component('admin.configuracao._form', ['configuracao' => $configuracao])
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
