@section('titulo', $membro->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Membro: <?=$membro->titulo?>
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('membro.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('membro.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('membro.edit', ['membro' => $membro->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $membro->id }}</td>
                    </tr>
                    <tr>
                        <td>Conselho:</td>
                        <td>@if ($membro->conselho){{ $membro->conselho->nome }}@endif</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $membro->nome }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ $membro->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td>{{ $membro->telefone }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{ $membro->resumo }}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($membro->ativo == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $membro->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $membro->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.membro._components._grid_arquivo', ['membro' => $membro])
        @endcomponent
    </div>
</x-app-layout>
