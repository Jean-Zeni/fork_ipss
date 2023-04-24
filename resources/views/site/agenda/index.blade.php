@extends('site.layouts.main')

@section('titulo', 'Agenda')


@section('conteudo')
{{ Breadcrumbs::render('contato') }}
    <section class="container-fluid">
        <div class="row">
            <div id="calendar"></div>
                <!-- MIOLO -->
                <div class="col-12 col-md-8 order-1">
                    <div class="box-lista">
                        <div class="padding30">
                            
                        </div>    
                    </div>
                    <br /><br />
                </div>
                <!-- LATERAL -->
                
            </div>
            
            <br><br>
        </div>
    </section>
    <br><br><br><br>
@endsection
