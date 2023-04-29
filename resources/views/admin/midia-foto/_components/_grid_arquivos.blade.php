<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if($foto->arquivos)
            @foreach ($foto->arquivos as $arquivo)                
                <tr>
                    <td><a href="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="foto" width="150px" height="84px" target="_blank" data-pjax="0"></td></a>
                    <th>{{ $arquivo->nome_original  }}</th>
                    <th>
                        <form action="{{ route('admin.arquivo.excluir', ['id' => $arquivo->id, 'tabela' => 'foto']) }}" method="POST"
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