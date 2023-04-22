@section('titulo', $conselho->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Conselho: <?=$conselho->titulo?>
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('conselho.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('conselho.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('conselho.edit', ['conselho' => $conselho->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $conselho->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $conselho->nome }}</td>
                    </tr>
                    <tr>
                        <td>Membros:</td>
                        <td>teste</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $conselho->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($conselho->ativo == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $conselho->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $conselho->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.conselho._components._grid_arquivo', ['conselho' => $conselho])
        @endcomponent
    </div>
</x-app-layout>
