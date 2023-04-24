@section('titulo', $evento->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Evento: {{$evento->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('evento.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('evento.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('evento.edit', ['evento' => $evento->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $evento->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $evento->title }}</td>
                    </tr>
                      <tr>
                        <td>Local:</td>
                        <td>{{ $evento->local }}</td>
                    </tr>
                      <tr>
                        <td>Resumo:</td>
                        <td>{{ $evento->resumo }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$evento->descricao?></td>
                    </tr>
                    <tr>
                        <td>Data ínicio:</td>
                        <td>{{$evento->start->format('d/m/Y à H:i')}}h</td>
                    </tr>
                    <tr>
                        <td>Data Fim:</td>
                        <td>{{$evento->end->format('d/m/Y à H:i')}}h</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $evento->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $evento->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
