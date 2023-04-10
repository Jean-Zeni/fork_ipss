@section('titulo', $banner->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Banner: <?=$banner->titulo?>
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('banner.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('banner.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('banner.edit', ['banner' => $banner->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $banner->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $banner->titulo }}</td>
                    </tr>
                    <tr>
                        <td>Posição:</td>
                        <td>{{ ($banner->tipo_posicao == 'cap') ? 'Capa' : null }}</td>
                    </tr>
                    <tr>
                        <td>Tipo Documento:</td>
                        <td>{{ ($banner->tipo_documento == 'IM') ? 'Imagem' : 'Vídeo' }}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($banner->ativo == 1) ? 'Sim' : 'Não' }}</td>
                    </tr>
                    <tr>
                        <td>Nova Guia:</td>
                        <td>{{ ($banner->nova_guia == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Data Ínicio:</td>
                        <td>{{ $banner->data_inicio->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Data Fim:</td>
                        <td>{{ $banner->data_fim->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $banner->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $banner->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.banner._components._grid_arquivo', ['banner' => $banner])
        @endcomponent
    </div>
</x-app-layout>
