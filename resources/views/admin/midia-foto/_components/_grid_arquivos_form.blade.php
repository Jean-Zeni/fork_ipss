<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @if($foto->arquivos)
            @foreach ($foto->arquivos as $arquivo)                
                <tr>
                    <td><a href="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/foto/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="foto" width="150px" height="84px" target="_blank" data-pjax="0"></td></a>
                    <th>{{ $arquivo->nome_original  }}</th>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<br><br>