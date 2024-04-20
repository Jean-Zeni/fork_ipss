<?php
$totalUsuariosPorCidade = 0;
$totalNovosUsuariosPorCidade = 0;
echo json_decode(env('GOOGLE_ANALYTICS_CREDENTIALS_PATH'));
?>

@section('titulo', 'Igreja Presbiteriana de Sapucaia do Sul | Administrativo')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container margin40T">
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="bg-warning">
                        <div class="padding20">
                            <h4 class="text-center">Olá! Seja bem-vindo à Área Administrativa do Site da IPSS!</h4>
                            <br><br>
                            <p class="text-center">Navegue pelo menu à cima para inserir conteúdos, de forma dinâmica, no site. Caso tenha cadastrado algum conteúdo errado,
                            basta excluí-lo e cadastrar novamente.
                            <br><br>
                            Dúvidas, envie mensagem (51) 98421-9721.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Analytics
        </h2><br>
        <form method="get" action="{{ route('dashboard') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <select name="data" style="width: 100%;" onchange="this.form.submit()">
                        <option value="hoje" <?=isset($parametro) && $parametro == 'hoje' ? 'selected' : ''?>> Hoje </option>
                        <option value="1" <?=isset($parametro) && $parametro == '1' ? 'selected' : ''?>> Ontem </option>
                        <option value="7" <?=isset($parametro) && $parametro == '7' || !$parametro ? 'selected' : ''?>> Últimos 7 dias </option>
                        <option value="14" <?=isset($parametro) && $parametro == '14' ? 'selected' : ''?>> Últimos 14 dias </option>
                        <option value="28" <?=isset($parametro) && $parametro == '28' ? 'selected' : ''?>> Últimos 28 dias </option>
                        <option value="30" <?=isset($parametro) && $parametro == '30' ? 'selected' : ''?>> Últimos 30 dias </option>
                        <option value="60" <?=isset($parametro) && $parametro == '60' ? 'selected' : ''?>> Últimos 60 dias </option>
                        <option value="90" <?=isset($parametro) && $parametro == '90' ? 'selected' : ''?>> Últimos 90 dias </option>
                        <option value="12m" <?=isset($parametro) && $parametro == '12m' ? 'selected' : ''?>> Últimos 12 meses </option>
                    </select>
                </div>
            </div>
        <form>
        <br>
        
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-success" style="background-color: #198754;">Usuários: 
                    {{$totalUsuariosPorPais}}
                </button>
                <button type="button" class="btn btn-success" style="background-color: #198754;">Usuários ativos nos últimos 30 mins: 
                    {{$usuariosAtivosUltimos30Mins}}
                </button>
            </div>
        </div><br>
        <div class="row">
            <div class="col-6">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-success">
                            <th colspan="2" class="text-center">Usuários por Cidade</th>
                        </tr>
                        <tr class="table-success">
                            <th scope="col">Cidade</th>
                            <th scope="col">Usuários</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuariosPorCidade->getRows() as $row)     
                        <?php $totalUsuariosPorCidade += $row->getMetricValues()[0]->getValue()?>
                            <tr>
                                <th scope="row">{{$row->getDimensionValues()[0]->getValue()}}</th>
                                <td>{{$row->getMetricValues()[0]->getValue()}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total: {{$totalUsuariosPorCidade}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-success">
                            <th colspan="2" class="text-center">Usuários por País</th>
                        </tr>
                        <tr class="table-success">
                            <th scope="col">Páis</th>
                            <th scope="col">Usuários</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuariosPorPais->getRows() as $row)    
                            <tr>
                                <th scope="row">{{$row->getDimensionValues()[0]->getValue()}}</th>
                                <td>{{$row->getMetricValues()[0]->getValue()}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total: {{$totalUsuariosPorPais}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-success">
                            <th colspan="2" class="text-center">Novos Usuários por Cidade</th>
                        </tr>
                        <tr class="table-success">
                            <th scope="col">Cidade</th>
                            <th scope="col">Usuários</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($novosUsuariosPorCidade->getRows() as $row)     
                        <?php $totalNovosUsuariosPorCidade += $row->getMetricValues()[0]->getValue()?>
                            <tr>
                                <th scope="row">{{$row->getDimensionValues()[0]->getValue()}}</th>
                                <td>{{$row->getMetricValues()[0]->getValue()}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total: {{$totalNovosUsuariosPorCidade}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-success">
                            <th colspan="2" class="text-center">Visualizações por Página</th>
                        </tr>
                        <tr class="table-success">
                            <th scope="col">Página</th>
                            <th scope="col">Visualizações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewsPorPagina->getRows() as $row)     
                            <tr>
                                <th scope="row">{{$row->getDimensionValues()[0]->getValue()}}</th>
                                <td>{{$row->getMetricValues()[0]->getValue()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
