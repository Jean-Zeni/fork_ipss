@section('titulo', $pagina->titulo.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Página: {{$pagina->titulo}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('pagina.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('pagina.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('pagina.edit', ['pagina' => $pagina->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $pagina->id }}</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>{{ $pagina->titulo }}</td>
                    </tr>
                    <tr>
                        <td>Resumo:</td>
                        <td>{{$pagina->resumo}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td><?=$pagina->descricao?></td>
                    </tr>
                    <tr>
                        <td>Youtube:</td>
                        <td>{{$pagina->link_youtube}}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($pagina->ativo == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $pagina->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $pagina->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        @component('admin.pagina._components._grid_arquivos', ['pagina' => $pagina])
        @endcomponent
    </div>
</x-app-layout>
