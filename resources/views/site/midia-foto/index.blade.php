@extends('site.layouts.main')

@section('titulo', 'Galeria de Fotos')

@section('conteudo')
{{ Breadcrumbs::render('foto') }}
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="titulo">
                    Galeria de Fotos
                    <span></span>
                </div>
                <div class="row">
                    @foreach ($fotos as $foto)
                        <div class="col-12 col-sm-6 col-md-4 marginB-resp">
                            @include('site.midia-foto._list_item',['foto'=>$foto])
                        </div>
                    @endforeach
                    {{ $fotos->appends($request)->links() }}
                </div>
                <br /><br />
            </div>
            <br/><br><br>
        </div>
    </section>
@endsection
