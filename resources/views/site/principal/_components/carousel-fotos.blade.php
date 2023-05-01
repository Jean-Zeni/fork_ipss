<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        @foreach ($imagens as $imagem)
        <div class="carousel-item active">
            <a href="/foto/view/{{$imagem->id}}">
                <article class="col-12 nopadding home-noticia-principal">
                    <img src="{{url('/')}}/storage/uploads/foto/{{$imagem->arquivos[0]->id}}/{{$imagem->arquivos[0]->arquivo}}" alt="{{$imagem->titulo}}" width="100%">
                    <strong>
                        <h3>{{$imagem->titulo}}</h3>
                        <span class="tarja"></span>
                    </strong>
                </article>
            </a>
        </div>
        @endforeach
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
</div>