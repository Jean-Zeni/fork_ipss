@section('titulo', $noticium->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Noticia: {{$noticium->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('noticia.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('noticia.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('noticia.edit', ['noticium' => $noticium->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $noticium->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $noticium->titulo }}</td>
                    </tr>
                    <tr>
                        <td>Autor:</td>
                        <td>{{ $noticium->autor }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{$noticium->resumo}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$noticium->descricao?></td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($noticium->ativo == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Destaque:</td>
                        <td>{{ ($noticium->destaque == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Data de Publicação:</td>
                        <td>@if ($noticium->data_publicacao){{ $noticium->data_publicacao->format('d/m/Y') }}@endif</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>@if($noticium->created_at){{  $noticium->created_at->format('d/m/Y à H:i:s') }}@endif</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>@if($noticium->updated_at){{ $noticium->updated_at->format('d/m/Y à H:i:s') }}@endif</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.noticia._components._grid_arquivos', ['noticia' => $noticium])
        @endcomponent
    </div>
</x-app-layout>
