@section('titulo', $reflexao->nome.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reflexão: {{$reflexao->nome}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('reflexao.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('reflexao.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('reflexao.edit', ['reflexao' => $reflexao->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $reflexao->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $reflexao->nome }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{ $reflexao->resumo }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$reflexao->descricao?></td>
                    </tr>
                    <tr>
                        <td>Autor:</td>
                        <td>@if ($reflexao->membro){{ $reflexao->membro->nome }}@endif</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($reflexao->ativo == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $reflexao->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $reflexao->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
