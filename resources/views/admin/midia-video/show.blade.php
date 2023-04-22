@section('titulo', $video->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            video: {{$video->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('video.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('video.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('video.edit', ['video' => $video->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $video->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $video->titulo }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{$video->resumo}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$video->descricao?></td>
                    </tr>
                    <tr>
                        <td>Youtube:</td>
                        <td>{{$video->link}}</td>
                    </tr>
                    <tr>
                        <td>Destaque:</td>
                        <td>{{ ($video->destaque == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Data de Publicação:</td>
                        <td>{{ $video->data_publicacao->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $video->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $video->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
