@section('titulo', $contato->nome.' | Visualizar')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            contato: {{$contato->nome}}
        </h2>
    </x-slot>
    <div class="container margin40T">
        <div style="width:90%; margin-left: auto; margin-right:auto;">
            <a href="{{ route('contato.create') }}" class="btn btn-success">Novo</a>
            <a href="{{ route('contato.index') }}" class="btn btn-primary">Listar</a>
            <a href="{{ route('contato.edit', ['contato' => $contato->id]) }}" class="btn btn-secondary">Editar</a>
        </div>
        <br>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right:auto;">
                
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $contato->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $contato->nome }}</td>
                    </tr>
                      <tr>
                        <td>Status:</td>
                        <td>{{ $contato->getStatusFormatado() }}</td>
                    </tr>
                      <tr>
                        <td>Tipo:</td>
                        <td>{{ $contato->getTipoFormatado() }}</td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td>{{$contato->email}}</td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td>{{$contato->telefone}}</td>
                    </tr>
                    <tr>
                        <td>Mensagem:</td>
                        <td>{{$contato->mensagem}}</td>
                    </tr>
                    <tr>
                        <td>Ativo:</td>
                        <td>{{ ($contato->ativo == 1) ? 'Sim' : 'Não'  }}</td>
                    </tr>
                    <tr>
                        <td>Resposta:</td>
                        <td>{{$contato->resposta}}</td>
                    </tr>
                    <tr>
                        <td>Data Resposta:</td>
                        <td>{{ $contato->data_resposta }}</td>
                    </tr>
                    <tr>
                        <td>Data Criação:</td>
                        <td>{{ $contato->created_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Data Modificação:</td>
                        <td>{{ $contato->updated_at->format('d/m/Y à H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
