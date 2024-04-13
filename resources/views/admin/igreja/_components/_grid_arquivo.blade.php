<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @if($igreja->arquivo)
            <td><a href="{{url('/')}}/storage/uploads/igreja/{{$igreja->arquivo->id}}/{{$igreja->arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/igreja/{{$igreja->arquivo->id}}/{{$igreja->arquivo->arquivo}}" alt="Igreja" width="100%"></td></a>
            <th>{{ $igreja->arquivo->nome_original  }}</th>
            <th>
                <form action="{{ route('admin.arquivo.excluir', ['id' => $igreja->arquivo->id, 'tabela' => 'igreja']) }}" method="POST"
                    onsubmit="return confirm('{{ trans('Você tem certeza que quer excluir este arquivo? ') }}');"
                    style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="px-4 py-2 text-white bg-red-700 rounded"
                    value="Deletar">
                </form>
            </th>
            @endif
        </tr>
    </tbody>
</table>
<br><br>