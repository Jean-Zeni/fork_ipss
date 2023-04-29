@if ($video->link)
    <div class="col-12 rounded-maior">
        <iframe width="100%" height="300" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
@endif
<div class="col-12 text-center">
    <a href="/video/view/{{$video->id}}">
        <h5><strong>{{$video->titulo}}</strong></h5>
    </a>
    @if ($video->data_publicacao)
        <p>Data de Publicação: {{$video->data_publicacao->format('d/m/Y')}}</p>
    @endif
</div>    
<br><br>
