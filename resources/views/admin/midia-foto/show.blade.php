@section('titulo', $foto->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Foto: {{$foto->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('foto.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('foto.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('foto.edit', ['foto' => $foto->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $foto->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $foto->titulo }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{$foto->resumo}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$foto->descricao?></td>
                    </tr>
                    <tr>
                        <td>Youtube:</td>
                        <td>{{$foto->link}}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($foto->ativo == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Destaque:</td>
                        <td>{{ ($foto->destaque == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Data de Publicação:</td>
                        <td>@if ($foto->data_publicacao){{ $foto->data_publicacao->format('d/m/Y') }}@endif</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $foto->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $foto->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.midia-foto._components._grid_arquivos', ['foto' => $foto])
        @endcomponent
    </div>
</x-app-layout>
