<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @if($noticia->arquivos)
            @foreach ($noticia->arquivos as $arquivo)                
                <tr>
                    <td><a href="{{url('/')}}/storage/uploads/noticia/{{$arquivo->id}}/{{$arquivo->arquivo}}"><img src="{{url('/')}}/storage/uploads/noticia/{{$arquivo->id}}/{{$arquivo->arquivo}}" alt="noticia" width="150px" height="84px" target="_blank" data-pjax="0"></td></a>
                    <th>{{ $arquivo->nome_original  }}</th>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<br><br>