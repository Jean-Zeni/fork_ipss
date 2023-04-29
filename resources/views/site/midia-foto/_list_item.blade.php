<a href="/foto/view/{{$foto->id}}">
    @if (count($foto->arquivos) != 0)
        <img src="{{url('/')}}/storage/uploads/foto/{{$foto->arquivos[0]->id}}/{{$foto->arquivos[0]->arquivo}}"  width="100%" class="thumb-foto" alt="{{$foto->titulo}}" title="{{$foto->titulo}}"> 
    @else
    <img src="{{url('/')}}/images/indisponivel-ipss.png" width="100%" class="thumb-foto" alt="{{$foto->titulo}}" title="{{$foto->titulo}}">
    @endif
</a>
<a href="/foto/view/{{$foto->id}}">
    <h5><strong>{{$foto->titulo}}</strong></h5>
</a>
@if ($foto->data_publicacao)
    <p>Data de Publicação: {{$foto->data_publicacao->format('d/m/Y')}}</p> 
@endif
