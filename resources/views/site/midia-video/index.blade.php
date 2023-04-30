@extends('site.layouts.main')

@section('titulo', 'Galeria de Vídeos')

@section('conteudo')
{{ Breadcrumbs::render('video') }}
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-8 col-xxl-9">
                    <div class="titulo">
                        Galeria de Vídeos
                        <span></span>
                    </div>
                    <div class="row">
                        @foreach ($videos as $video)
                            <div class="col-12 col-md-6 marginB-resp">
                                @include('site.midia-video._list_item',['video'=>$video])
                            </div>
                        @endforeach
                        {{ $videos->appends($request)->links() }}
                    </div>
                    <br /><br />
                </div>
                <!--FILTRO LATERAL-->
                <div class="col-12 col-xl-4 col-xxl-3">
                    <div class="box padding-busca responsive-reverse">
                        <strong>Buscar</strong>
                        <hr />
                        <p>Abaixo você poderá realizar buscas a partir de um termo.</p>
                        <form method="get" action="{{ route('site.video') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3"> 
                            <input type="text" name="termo" value="{{old('termo')}}" placeholder="Termo..." class="form-busca">
                            {{ $errors->has('termo') ? $errors->first('termo') : '' }}
                            </div>
                            <button type="submit" class="btn-padrao">Buscar</button>
                            <a href="/video" class="btn-padrao">Limpar</a>
                        <form>
                    </div>
                </div>
            </div>
            <br/><br><br>
        </div>
    </section>
@endsection
