<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if($pagina->arquivos)
            @foreach ($pagina->arquivos as $arquivo)                
                <tr>
                    <td>
                        <a href="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}">
                        @if ($arquivo->tipo == "I")
                            <img src="{{url('/')}}/storage/uploads/pagina/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="pagina" width="150px" height="84px" target="_blank" data-pjax="0">
                        @else
                            <span class="material-symbols-outlined font-d text-center">
                            picture_as_pdf
                            </span>
                        @endif
                        </a>
                    </td>
                    <th>{{ $arquivo->nome_original  }}</th>
                    <th>{{ ($arquivo->tipo == 'I') ? 'Imagem' : 'Documento'    }}</th>
                    <th>
                        <form action="{{ route('admin.arquivo.excluir', ['id' => $arquivo->id, 'tabela' => 'pagina']) }}" method="POST"
                            onsubmit="return confirm('{{ trans('Você tem certeza que quer excluir este arquivo? ') }}');"
                            style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="px-4 py-2 text-white bg-red-700 rounded"
                            value="Deletar">
                        </form>
                    </th>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<br><br>