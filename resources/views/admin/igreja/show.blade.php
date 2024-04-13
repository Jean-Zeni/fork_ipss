@section('titulo', $igreja->nome.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Igreja: <?=$igreja->nome?>
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('igreja.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('igreja.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('igreja.edit', ['igreja' => $igreja->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $igreja->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $igreja->nome }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{ $igreja->resumo }}</td>
                    </tr>
                    <tr>
                        <td>Endereço:</td>
                        <td>{{ $igreja->endereco }}</td>
                    </tr>
                    <tr>
                        <td>Link Site:</td>
                        <td>{{ $igreja->link_site }}</td>
                    </tr>
                    <tr>
                        <td>Latitude:</td>
                        <td>{{ $igreja->latitude }}</td>
                    </tr>
                    <tr>
                        <td>Longitude:</td>
                        <td>{{ $igreja->longitude }}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($igreja->ativo == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Congregação:</td>
                        <td>{{ ($igreja->congregacao == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Igreja de Sapucaia:</td>
                        <td>{{ ($igreja->igreja_sapucaia == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $igreja->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $igreja->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.igreja._components._grid_arquivo', ['igreja' => $igreja])
        @endcomponent
    </div>
</x-app-layout>
